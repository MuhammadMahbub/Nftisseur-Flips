<?php

namespace Database\Seeders;

use App\Models\ColorSetting;
use Illuminate\Database\Seeder;

class ColorSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ColorSetting::create([
            'theme_color'           => '#000000',
            'menu_text_color'       => '#ffffff',
            'background_color'      => '#ffd700',
        ]);
    }
}
