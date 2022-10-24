<?php

namespace App\Http\Controllers;

use App\Models\ZikzakImage;
use Illuminate\Http\Request;

class ZikzakImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.zikzak.index');
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
     * @param  \App\Models\ZikzakImage  $zikzakImage
     * @return \Illuminate\Http\Response
     */
    public function show(ZikzakImage $zikzakImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ZikzakImage  $zikzakImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ZikzakImage $zikzakImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ZikzakImage  $zikzakImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $zikzakImage = ZikzakImage::find($id);

        if ($request->hasFile('title_border')) {

            $title_border  = $request->file('title_border');
            $filename    = uniqid() . '.' . $title_border->extension('title_border');
            $location    = public_path('uploads/zikzak');

            $title_border->move($location, $filename);

            $zikzakImage->title_border = $filename;
        }

        if ($request->hasFile('section_border')) {

            $section_border  = $request->file('section_border');
            $filename    = uniqid() . '.' . $section_border->extension('section_border');
            $location    = public_path('uploads/zikzak');

            $section_border->move($location, $filename);

            $zikzakImage->section_border = $filename;
        }

        $zikzakImage->save();

        return back()->withSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ZikzakImage  $zikzakImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZikzakImage $zikzakImage)
    {
        //
    }
}
