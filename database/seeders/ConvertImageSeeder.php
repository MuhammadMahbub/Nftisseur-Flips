<?php

namespace Database\Seeders;

use App\Models\ConvertImage;
use Illuminate\Database\Seeder;

class ConvertImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConvertImage::create([
            'image' => 'convert_1.jpeg',
        ]);
        ConvertImage::create([
            'image' => 'convert_3.jpeg',
        ]);
        ConvertImage::create([
            'image' => 'convert_1.jpeg',
        ]);
    }
}
