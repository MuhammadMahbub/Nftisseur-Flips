<?php

namespace Database\Seeders;

use App\Models\Discord;
use Illuminate\Database\Seeder;

class DiscordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discord::create([
            'name'          => 'Discordia.',
            'server_link'   => '#',
            'image'         => 'discord1.png',
            'price'         => '20',
        ]);
        Discord::create([
            'name'          => 'Dark Matter.',
            'server_link'   => '#',
            'image'         => 'discord2.png',
            'price'         => '30',
        ]);
        Discord::create([
            'name'          => 'Olympus.',
            'server_link'   => '#',
            'image'         => 'discord3.png',
            'price'         => '40',
        ]);
    }
}
