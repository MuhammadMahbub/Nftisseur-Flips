<?php

namespace Database\Seeders;

use App\Models\Convert;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ConvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Convert::create([
            'title'      => '{"fr":"'.'COMMENT TRANSFORMER'.'","en":"'.'HOW TO TRANSFORM'.'"}',
            'min_value'  => '35',
            'max_value'  => '3500',
            'created_at' => Carbon::now(),
        ]);
    }
}
