<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'logo'               => 'logo.png',
            'favicon'            => 'favicon.png',
            'meta_title'         => 'Meta Title',
            'meta_description'   => 'Meta Description',
            'meta_keywords'      => 'Meta Keywords',
            'meta_author'        => 'Meta Author',
            'copyright_name'     => 'SoClose',
            'copyright_link'     => '#!',
        ]);
    }
}
