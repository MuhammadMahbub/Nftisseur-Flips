<?php

namespace Database\Seeders;

use App\Models\ImageConvert;
use Illuminate\Database\Seeder;

class ImageConvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageConvert::create([
            'actual_image'    => 'convert_1.jpeg',
            'converted_image' => 'convert_3.jpeg',
        ]);
    }
}
