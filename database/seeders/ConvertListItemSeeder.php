<?php

namespace Database\Seeders;

use App\Models\ConvertListItem;
use Illuminate\Database\Seeder;

class ConvertListItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConvertListItem::create([
            'name' => '{"fr":"'.'Pas le temps de grind des whitelist ?'.'","en":"'.'No time to grind whitelists?'.'"}'
        ]);
        ConvertListItem::create([
            'name' => '{"fr":"'.'Ici vous êtes accompagné par les meilleures experts Flip de France. L’objectif est'.'","en":"'.'Here you are accompanied by the best Flip experts in France. The objective is to'.'"}'
        ]);
        ConvertListItem::create([
            'name' => '{"fr":"'.'de viser un smic en seulement 15 jours !'.'","en":"'.'to aim for a minimum wage in just 15 days!'.'"}'
        ]);
        ConvertListItem::create([
            'name' => '{"fr":"'.'alors pourquoi pas vous ?'.'","en":"'.'so why not you?'.'"}'
        ]);
    }
}
