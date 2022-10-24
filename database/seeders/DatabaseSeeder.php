<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            GeneralSettingSeeder::class,
            ColorSettingSeeder::class,
            SocialUrlSeeder::class,
            UserSeeder::class,
            BannerSeeder::class,
            ConvertSeeder::class,
            ConvertImageSeeder::class,
            ConvertListItemSeeder::class,
            ServiceSeeder::class,
            ServiceBannerSeeder::class,
            TitleSeeder::class,
            FAQSeeder::class,
            PricingSeeder::class,
            PricingListSeeder::class,
            ImageConvertSeeder::class,
            DiscordSeeder::class,
            ZikzakSeeder::class,
        ]);
    }
}
