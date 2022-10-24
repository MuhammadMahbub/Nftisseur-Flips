<?php

namespace Database\Seeders;

use App\Models\ZikzakImage;
use Illuminate\Database\Seeder;

class ZikzakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ZikzakImage::create([
            'title_border'   => 'title-border.png',
            'section_border' => 'section-border.png'
        ]);
    }
}
