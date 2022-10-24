<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::first();
        $banner_title  = json_decode($banner->banner_title);
        $banner_text   = json_decode($banner->banner_text);
        $button_text   = json_decode($banner->button_text);
        return view('admin.banners.index', compact('banner','banner_title','banner_text','button_text'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'banner_title.*'   => 'required',
            'banner_text.*'    => 'required',
            'button_text.*'    => 'required',
            'image'            => 'image'
        ]);

        $banner = Banner::find($id);

        $banner->update([
            'banner_title'    => $request->banner_title,
            'banner_text'     => $request->banner_text,
            'button_text'     => $request->button_text,
            'updated_at'      => Carbon::now()
        ]);

        if ($request->hasFile('image')) {

            $image  = $request->file('image');
            $filename    = uniqid() . '.' . $image->extension('image');
            $location    = public_path('uploads/banner');

            $image->move($location, $filename);

            $banner->image = $filename;
        }

        $banner->save();

        return redirect()->route('banner.index')->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
