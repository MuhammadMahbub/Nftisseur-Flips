<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Discord;
use Illuminate\Http\Request;

class DiscordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.discord.index',[
            'discord' => Discord::all(),
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
            'name'          => 'required',
            'server_link'   => 'required',
            'price'         => 'required|numeric',
            'image'         => 'required|image',
        ]);

        $discord = Discord::create($request->except('_token') + ['created_at' => Carbon::now()]);

        if ($request->hasFile('image')) {

            $image  = $request->file('image');
            $filename    = uniqid() . '.' . $image->extension('image');
            $location    = public_path('uploads/discord');

            $image->move($location, $filename);

            $discord->image = $filename;
        }

        $discord->save();

        return redirect()->route('discord.index')->withSuccess('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discord  $discord
     * @return \Illuminate\Http\Response
     */
    public function show(Discord $discord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discord  $discord
     * @return \Illuminate\Http\Response
     */
    public function edit(Discord $discord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discord  $discord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        session()->put('discord_id',$id);
        $request->validate([
            'name_edit'          => 'required',
            'server_link_edit'   => 'required',
            'price_edit'         => 'required|numeric',
            'image_edit'         => 'image',
        ]);

        $discord = Discord::find($id);
        $discord->update([
            'name'          => $request->name_edit,
            'server_link'   => $request->server_link_edit,
            'price'         => $request->price_edit,
            'updated_at'    => Carbon::now()
        ]);

        if ($request->hasFile('image_edit')) {

            $image  = $request->file('image_edit');
            $filename    = uniqid() . '.' . $image->extension('image_edit');
            $location    = public_path('uploads/discord');

            $image->move($location, $filename);

            $discord->image = $filename;
        }

        $discord->save();
        session()->forget(['discord_id']);

        return redirect()->route('discord.index')->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discord  $discord
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discord::find($id)->delete();

        return back()->with('error','Deleted successfully');
    }

    public function date_wise_search_discord(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date'   => 'required',
        ]);

        $from_date  = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $discord  = Discord::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $discord->count();

        $view  = view('admin.includes.discord.index', compact('discord'))->render();

        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_wise_clear_discord(Request $request){
        $discord = Discord::all();
        $count = $discord->count();

        $view = view('admin.includes.discord.index', compact('discord'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function search_wise_discord(Request $request){
        if ($request->search_value != null) {
            $discord  =  Discord::where('name','LIKE','%' . $request->search_value . '%')->get();
        } else {
            $discord = Discord::all();
        }

        $count = $discord->count();

        $view  = view('admin.includes.discord.index', compact('discord'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    public function discord_single_delete(Request $request)
    {
        foreach($request->ids as $id){
            Discord::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }

    public function discord_multi_delete(Request $request)
    {
        foreach($request->ids as $id){
            Discord::find($id)->delete();
        };

        return response()->json(['success' => 'done']);
    }


}
