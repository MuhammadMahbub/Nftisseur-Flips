<?php

namespace Database\Seeders;

use App\Models\PricingList;
use Illuminate\Database\Seeder;

class PricingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PricingList::create([
            'pricing_id' => '1',
            'name'       => '{"fr":"'.'Pas le temps de grind des whitelist ?'.'","en":"'.'No time to grind whitelists?'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '1',
            'name'       => '{"fr":"'.'vous voulez du profit rapidement ?'.'","en":"'.'Do you want a quick profit?'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '1',
            'name'       => '{"fr":"'.'Ici vous êtes accompagné par les meilleures experts Flip de France. L’objectif est'.'","en":"'.'Here you are accompanied by the best Flip experts in France. The objective is to'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '1',
            'name'       => '{"fr":"'.'de viser un smic en seulement 15 jours !'.'","en":"'.'to aim for a minimum wage in just 15 days!'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '1',
            'name'       => '{"fr":"'.'Alors pourquoi pas vous ?'.'","en":"'.'So why not you?'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '2',
            'name'       => '{"fr":"'.'Pas le temps de grind des whitelist ?'.'","en":"'.'No time to grind whitelists?'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '2',
            'name'       => '{"fr":"'.'vous voulez du profit rapidement ?'.'","en":"'.'Do you want a quick profit?'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '2',
            'name'       => '{"fr":"'.'Ici vous êtes accompagné par les meilleures experts Flip de France. L’objectif est'.'","en":"'.'Here you are accompanied by the best Flip experts in France. The objective is to'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '2',
            'name'       => '{"fr":"'.'de viser un smic en seulement 15 jours !'.'","en":"'.'to aim for a minimum wage in just 15 days!'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '2',
            'name'       => '{"fr":"'.'Alors pourquoi pas vous ?'.'","en":"'.'So why not you?'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '3',
            'name'       => '{"fr":"'.'Pas le temps de grind des whitelist ?'.'","en":"'.'No time to grind whitelists?'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '3',
            'name'       => '{"fr":"'.'vous voulez du profit rapidement ?'.'","en":"'.'Do you want a quick profit?'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '3',
            'name'       => '{"fr":"'.'Ici vous êtes accompagné par les meilleures experts Flip de France. L’objectif est'.'","en":"'.'Here you are accompanied by the best Flip experts in France. The objective is to'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '3',
            'name'       => '{"fr":"'.'de viser un smic en seulement 15 jours !'.'","en":"'.'to aim for a minimum wage in just 15 days!'.'"}',
        ]);
        PricingList::create([
            'pricing_id' => '3',
            'name'       => '{"fr":"'.'Alors pourquoi pas vous ?'.'","en":"'.'So why not you?'.'"}',
        ]);
    }
}
