<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pricing;
use App\Models\PricingList;
use Illuminate\Http\Request;
use Stripe\Card;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pricing.index',[
            'pricing' => Pricing::all()
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
            'icon'    => 'required',
            'text.*'  => 'required',
        ]);

        Pricing::create([
            'title'         => '{"fr":"'.$request->title['fr'].'","en":"'.$request->title['en'].'"}',
            'text'          => '{"fr":"'.$request->text['fr'].'","en":"'.$request->text['en'].'"}',
            'icon'          => $request->icon,
            'created_at'    => Carbon::now(),
        ]);

        return back()->withSuccess('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function show(Pricing $pricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricing $pricing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        session()->put('pricing_id',$id);
        $request->validate([
            'title_edit.*' => 'required',
            'icon_edit'    => 'required',
            'text_edit.*'  => 'required',
        ]);

        $pricing = Pricing::find($id);
        $pricing->update([
            'title'       => $request->title_edit,
            'text'        => $request->text_edit,
            'icon'        => $request->icon_edit,
            'updated_at'  => Carbon::now(),
        ]);
        session()->forget('pricing_id');

        return redirect()->route('pricing.index')->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pricelist = PricingList::where('pricing_id', $id)->get();
        foreach($pricelist as $price){
            $price->update([
                'pricing_id' => NULL
            ]);
        }

        Pricing::find($id)->delete();

        return back()->with('error','Updated successfully');
    }

    public function pricing_single_delete(Request $request)
    {
        foreach($request->ids as $id){

            $pricelist = PricingList::where('pricing_id', $id)->get();
            foreach($pricelist as $price){
                $price->update([
                    'pricing_id' => NULL
                ]);
            }

            Pricing::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }

    public function pricing_multi_delete(Request $request)
    {
        foreach($request->ids as $id){

            $pricelist = PricingList::where('pricing_id', $id)->get();
            foreach($pricelist as $price){
                $price->update([
                    'pricing_id' => NULL
                ]);
            }

            Pricing::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }


    public function date_wise_search_pricing(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date'   => 'required',
        ]);

        $from_date  = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $pricing  = Pricing::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $pricing->count();

        $view  = view('admin.includes.pricing.index', compact('pricing'))->render();

        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_wise_clear_pricing(Request $request){
        $pricing = Pricing::all();
        $count = $pricing->count();

        $view = view('admin.includes.pricing.index', compact('pricing'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function search_wise_pricing(Request $request){
        if ($request->search_value != null) {
            $pricing  =  Pricing::where('title','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $pricing = Pricing::all();
        }

        $count = $pricing->count();

        $view  = view('admin.includes.pricing.index', compact('pricing'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

}
