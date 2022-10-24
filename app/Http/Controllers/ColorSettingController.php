<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ColorSetting;
use Illuminate\Http\Request;

class ColorSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.colorSettings.index', [
            'colorSettings' => colorSetting::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ColorSetting  $colorSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColorSetting $colorSetting)
    {
        $request->validate([
            'theme_color'  => 'required',
        ]);

        $colorSetting->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        return back()->withSuccess('Updated Successfully');
    }

}
