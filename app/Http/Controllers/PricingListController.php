<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pricing;
use App\Models\PricingList;
use Illuminate\Http\Request;

class PricingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pricing.list_index',[
            'pricinglist' => PricingList::all(),
            'pricing'     => Pricing::all(),
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
            'pricing_id'   => 'required',
            'name.*'       => 'required',
        ]);

        PricingList::create([
            'name'          => '{"fr":"'.$request->name['fr'].'","en":"'.$request->name['en'].'"}',
            'pricing_id'    => $request->pricing_id,
            'created_at'    => Carbon::now(),
        ]);

        return redirect()->route('pricinglist.index')->withSuccess('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PricingList  $pricingList
     * @return \Illuminate\Http\Response
     */
    public function show(PricingList $pricingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PricingList  $pricingList
     * @return \Illuminate\Http\Response
     */
    public function edit(PricingList $pricingList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PricingList  $pricingList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        session()->put('list_id', $id);
        $request->validate([
            'name.*' => 'required',
        ]);

        $list = PricingList::find($id);
        $list->update([
            'name.*'      => $request->name_edit,
            'updated_at'  => Carbon::now(),
        ]);
        session()->forget('list_id');

        return redirect()->route('pricinglist.index')->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricingList  $pricingList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PricingList::find($id)->delete();

        return back()->with('error', 'Deleted Successfully');
    }

    // public function search_wise_service(Request $request){
    //     if ($request->search_value != null) {
    //         $services  =  PricingList::where('title','LIKE','%' . $request->search_value . '%')->get();
    //     } else {
    //         $services = PricingList::all();
    //     }

    //     $count = $services->count();

    //     $view  = view('admin.includes.service.index', compact('services'))->render();
    //     return response()->json(['data' => $view , 'count' => $count]);
    // }


}
