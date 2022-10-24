<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Convert;
use App\Models\ConvertImage;
use App\Models\ConvertListItem;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convert = Convert::first();
        $convert_title  = json_decode($convert->title);
        return view('admin.convert.index',compact('convert','convert_title'));
    }

    public function convertimage_index()
    {
        return view('admin.convert.convert_image_index',[
            'convertimages' => ConvertImage::all(),
        ]);
    }

    public function convertimage_create(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        if ($request->hasFile('image')) {

            $image  = $request->file('image');
            $filename    = uniqid() . '.' . $image->extension('image');
            $location    = public_path('uploads/convert');

            $image->move($location, $filename);

            ConvertImage::create([
                'image'      => $filename,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect()->route('convertimage_index')->withSuccess('Created successfully');
    }

    public function convertimage_update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image'
        ]);

        $convertimage = ConvertImage::find($id);

        if ($request->hasFile('image')) {

            $image  = $request->file('image');
            $filename    = uniqid() . '.' . $image->extension('image');
            $location    = public_path('uploads/convert');

            $image->move($location, $filename);

            $convertimage->image = $filename;
        }

        $convertimage->save();

        return redirect()->route('convertimage_index')->withSuccess('Updated successfully');
    }

    public function convertimage_destroy($id)
    {
        ConvertImage::find($id)->delete();
        return back()->with('error', 'Deleted Successfully!');
    }

    public function convertlistitem_index()
    {
        return view('admin.convert.convert_list_item_index',[
            'convertitems' => ConvertListItem::all(),
        ]);
    }

    public function convertlistitem_create(Request $request)
    {
        $request->validate([
            'name.*' => 'required'
        ]);

        ConvertListItem::create([
            'name'       => '{"fr":"'.$request->name['fr'].'","en":"'.$request->name['en'].'"}',
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('convertlistitem_index')->withSuccess('Created successfully');
    }

    public function convertlistitem_update(Request $request, $id)
    {
        $request->validate([
            'name.*' => 'required'
        ]);

        $convertlistitem = ConvertListItem::find($id);

        $convertlistitem->update([
            'name' => $request->name,
        ]);

        return redirect()->route('convertlistitem_index')->withSuccess('Updated successfully');
    }

    public function convertlistitem_destroy($id)
    {
        ConvertListItem::find($id)->delete();
        return back()->with('error', 'Deleted Successfully!');
    }

    public function convert_list_multi_delete(Request $request)
    {
        foreach($request->ids as $id){
            ConvertListItem::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }

    public function convert_list_single_delete(Request $request)
    {
        foreach($request->ids as $id){
            ConvertListItem::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convert  $convert
     * @return \Illuminate\Http\Response
     */
    public function show(Convert $convert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convert  $convert
     * @return \Illuminate\Http\Response
     */
    public function edit(Convert $convert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convert  $convert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'title.*'    => 'required',
            'min_value'  => 'required|numeric',
            'max_value'  => 'required|numeric',
        ]);

        $convert = Convert::find($id);

        $convert->update([
            'title'         => $request->title,
            'min_value'     => $request->min_value,
            'max_value'     => $request->max_value,
            'updated_at'    => Carbon::now()
        ]);

        return redirect()->route('convert.index')->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convert  $convert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convert $convert)
    {
        //
    }

    public function date_wise_search_convertitem(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date'   => 'required',
        ]);

        $from_date  = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $convertitems  = ConvertListItem::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $convertitems->count();

        $view  = view('admin.includes.convert.item_index', compact('convertitems'))->render();

        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_wise_clear_convertitem(Request $request){
        $convertitems = ConvertListItem::all();
        $count = $convertitems->count();

        $view = view('admin.includes.convert.item_index', compact('convertitems'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function search_wise_convertitem(Request $request){
        if ($request->search_value != null) {
            $convertitems  =  ConvertListItem::where('name','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $convertitems = ConvertListItem::all();
        }

        $count = $convertitems->count();

        $view  = view('admin.includes.convert.item_index', compact('convertitems'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    public function date_wise_search_convertimage(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date'   => 'required',
        ]);

        $from_date  = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $convertimages  = ConvertImage::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $convertimages->count();

        $view  = view('admin.includes.convert.image_index', compact('convertimages'))->render();

        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_wise_clear_convertimage(Request $request){
        $convertimages = ConvertImage::all();
        $count = $convertimages->count();

        $view = view('admin.includes.convert.image_index', compact('convertimages'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function search_wise_convertimage(Request $request){
        if ($request->search_value != null) {
            $convertimages  =  ConvertImage::where('image','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $convertimages = ConvertImage::all();
        }

        $count = $convertimages->count();

        $view  = view('admin.includes.convert.image_index', compact('convertimages'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

}
