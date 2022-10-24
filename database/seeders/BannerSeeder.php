<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'banner_title'  => '{"fr":"'.'Quick Flips! Lunique communauté francophone sur le Flip NFT !'.'","en":"'.'Quick Flips! The only French-speaking community on the Flip NFT!'.'"}',
            'banner_text'   => '{"fr":"'.'En partant de zéro, sans compétence particulière. Adapté à tous les profils et tous types de budgets.'.'","en":"'.'From scratch, without any particular skills. Suitable for all profiles and all types of budgets.'.'"}',
            'button_text'   => '{"fr":"'.'Rejoignez nous'.'","en":"'.'Join us'.'"}',
            'image'         => 'banner_1.png',
        ]);
    }
}
