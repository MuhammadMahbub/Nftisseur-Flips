<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class GeneralSettingController extends Controller
{

     /**
     * Construct
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('verified');
        // $this->middleware('checkAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.generalSettings.index', [

            'generalSettings' => GeneralSetting::first()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        $request->validate([
            'logo'              => 'image',
            'favicon'           => 'image',
            'meta_title'        => 'required',
            'meta_description'  => 'required',
            'meta_keywords'     => 'required',
            'meta_author'       => 'required',
            'copyright_name'    => 'required',
            'copyright_link'    => 'required',
        ]);

        $generalSetting->update($request->except('_token') + ['updated_at' => Carbon::now()]);

         if($request->hasFile('logo')){

            $logo = $request->file('logo');
            $filename = uniqid(). $logo->extension('logo');
            $location = public_path('uploads/generalSettings/');
            $logo->move($location, $filename);

            $generalSetting->logo = $filename;

        }

        if($request->hasFile('favicon')){

            $favicon = $request->file('favicon');
            $favicon_filename = uniqid(). $favicon->extension('favicon');
            $favicon_location = public_path('uploads/generalSettings/');
            $favicon->move($favicon_location, $favicon_filename);

            $generalSetting->favicon = $favicon_filename;
        }

        $generalSetting->save();

        return back()->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
