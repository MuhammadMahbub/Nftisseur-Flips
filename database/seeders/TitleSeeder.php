<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Title::create([
            'pricing_title' => '{"fr":"'.'QUICK FLIP, POUR TOUS LES NIVEAUX'.'","en":"'.'QUICK FLIP, FOR ALL LEVELS'.'"}',
            'faq_title'     => '{"fr":"'.'Vous êtes vous déjà posé ces questions ?'.'","en":"'.'Have you ever asked yourself these questions?'.'"}',
        ]);
    }
}
