<?php

namespace Database\Seeders;

use App\Models\ServiceBanner;
use Illuminate\Database\Seeder;

class ServiceBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceBanner::create([
            'image' => 'services-banner.png',
        ]);
    }
}
