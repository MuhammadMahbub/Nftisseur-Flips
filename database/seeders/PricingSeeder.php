<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pricing::create([
            'icon'   => '<i class="bi bi-shield"></i>',
            'title'  => '{"fr":"'.'DÉBUTANTS'.'","en":"'.'BEGINNERS'.'"}',
            'text'   => '{"fr":"'.'Si vous débutez, nous vous expliquerons comment commencer vos premiers investissements !'.'","en":"'.'If you are just starting out, we will tell you how to start your first investments!'.'"}',
        ]);
        Pricing::create([
            'icon'   => '<i class="bi bi-award"></i>',
            'title'  => '{"fr":"'.'DÉBUTANTS'.'","en":"'.'BEGINNERS'.'"}',
            'text'   => '{"fr":"'.'Si vous débutez, nous vous expliquerons comment commencer vos premiers investissements !'.'","en":"'.'If you are just starting out, we will tell you how to start your first investments!'.'"}',
        ]);
        Pricing::create([
            'icon'   => '<i class="bi bi-trophy"></i>',
            'title'  => '{"fr":"'.'DÉBUTANTS'.'","en":"'.'BEGINNERS'.'"}',
            'text'   => '{"fr":"'.'Si vous débutez, nous vous expliquerons comment commencer vos premiers investissements !'.'","en":"'.'If you are just starting out, we will tell you how to start your first investments!'.'"}',
        ]);
    }
}
