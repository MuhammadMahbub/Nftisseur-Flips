<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\ServiceBanner;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function service_banner()
    {
        return view('admin.service.banner',[
            'service' => ServiceBanner::first()
        ]);
    }

    public function service_banner_update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image',
        ]);

        $service = ServiceBanner::find($id);

        if ($request->hasFile('image')) {

            $image  = $request->file('image');
            $filename    = uniqid() . '.' . $image->extension('image');
            $location    = public_path('uploads/services');

            $image->move($location, $filename);

            $service->image = $filename;
        }

        $service->save();

        return redirect()->route('service_banner')->withSuccess('Updated successfully');
    }

    public function index()
    {
        return view('admin.service.index',[
            'services' => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title.*' => 'required',
            'icon.*'  => 'required',
            'text.*'  => 'required',
        ]);

        Service::create([
            'icon'    => $request->icon,
            'title'   => '{"fr":"'.$request->title['fr'].'","en":"'.$request->title['en'].'"}',
            'text'    => '{"fr":"'.$request->text['fr'].'","en":"'.$request->text['en'].'"}',
        ]);

        return redirect()->route('service.index')->withSuccess('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        session()->put('service_id',$id);
        $request->validate([
            'title_edit.*' => 'required',
            'icon_edit'  => 'required',
            'text_edit.*'  => 'required',
        ]);

        $service = Service::find($id);
        $service->update([
            'title'      => $request->title_edit,
            'text'       => $request->text_edit,
            'icon'       => $request->icon_edit,
            'updated_at' => Carbon::now()
        ]);
        session()->forget('service_id');

        return redirect()->route('service.index')->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();

        return back()->with('error','Updated successfully');
    }

    public function service_single_delete(Request $request)
    {
        foreach($request->ids as $id){
            Service::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }

    public function service_multi_delete(Request $request)
    {
        foreach($request->ids as $id){
            Service::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }

    public function date_wise_search_service(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date'   => 'required',
        ]);

        $from_date  = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $services  = Service::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $services->count();

        $view  = view('admin.includes.service.index', compact('services'))->render();

        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_wise_clear_service(Request $request){
        $services = Service::all();
        $count = $services->count();

        $view = view('admin.includes.service.index', compact('services'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }


    public function search_wise_service(Request $request){
        if ($request->search_value != null) {
            $services  =  Service::where('title','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $services = Service::all();
        }

        $count = $services->count();

        $view  = view('admin.includes.service.index', compact('services'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

}
