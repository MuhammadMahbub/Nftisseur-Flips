<?php

namespace App\Http\Controllers;

use App\Models\ImageConvert;
use Illuminate\Http\Request;

class ImageConvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.convert.image_convert', [
            'imageconvert' => ImageConvert::first(),
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageConvert  $imageConvert
     * @return \Illuminate\Http\Response
     */
    public function show(ImageConvert $imageConvert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageConvert  $imageConvert
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageConvert $imageConvert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageConvert  $imageConvert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'actual_image'    => 'image',
            'converted_image' => 'image'
        ]);

        $imageConvert = ImageConvert::find($id);

        if ($request->hasFile('actual_image')) {

            $actual_image  = $request->file('actual_image');
            $filename    = uniqid() . '.' . $actual_image->extension('actual_image');
            $location    = public_path('uploads/convert');

            $actual_image->move($location, $filename);

            $imageConvert->actual_image = $filename;
        }

        if ($request->hasFile('converted_image')) {

            $converted_image  = $request->file('converted_image');
            $filename    = uniqid() . '.' . $converted_image->extension('converted_image');
            $location    = public_path('uploads/convert');

            $converted_image->move($location, $filename);

            $imageConvert->converted_image = $filename;
        }

        $imageConvert->save();

        return back()->withSuccess('Converted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageConvert  $imageConvert
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageConvert $imageConvert)
    {
        //
    }
}
