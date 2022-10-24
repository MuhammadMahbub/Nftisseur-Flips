<?php

function generalsettings()
{
    return \App\Models\GeneralSetting::first();
}

function socialurls()
{
    return \App\Models\Socialurl::first();
}

function colorSettings()
{
    return \App\Models\ColorSetting::first();
}

function themesettings($user_id)
{
    return \App\Models\ThemeSetting::where('user_id', $user_id)->first();
}

function zikzakImages()
{
    return \App\Models\ZikzakImage::first();
}
