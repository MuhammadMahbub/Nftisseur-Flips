<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'icon'      => '<i class="bi bi-layout-wtf"></i>',
            'title'     => '{"fr":"'.'Comment bien commencer'.'","en":"'.'How to get started'.'"}',
            'text'      => '{"fr":"'.'Comprendre ce qu’est un NFT, comment le choisir par rapport a son utilité et sa valeur. Maîtriser les étapes crypto/blockchain. Tutoriel explicatif pour chaque étape'.'","en":"'.'Understand what an NFT is, how to choose it in relation to its utility and value. Master the crypto/blockchain steps. Explanatory tutorial for each step'.'"}',
        ]);

        Service::create([
            'icon'      => '<i class="bi bi-trophy"></i>',
            'title'     => '{"fr":"'.'Trouver Le NFT gagnant'.'","en":"'.'Finding the winning NFT'.'"}',
            'text'      => '{"fr":"'.'Les différentes notions à parcourir avant de trouver le NFT qui vous générera vos premiers milliers deuros. Adapté à TOUS les budgets !!'.'","en":"'.'The different notions to go through before finding the NFT that will generate your first thousands of euros. Suitable for ALL budgets!'.'"}'
        ]);

        Service::create([
            'icon'      => '<i class="bi bi-globe2"></i>',
            'title'     => '{"fr":"'.'Les connaissances indispensables pour faire du profit'.'","en":"'.'The knowledge needed to make a profit'.'"}',
            'text'      => '{"fr":"'.'Je vais partager mes exclusivités afin de multiplier votre investissement le plus rapidement possible.'.'","en":"'.'I will share my exclusivities to multiply your investment as quickly as possible.'.'"}'
        ]);

        Service::create([
            'icon'      => '<i class="bi bi-bag"></i>',
            'title'     => '{"fr":"'.'Créez et vendez votre NFT'.'","en":"'.'Create and sell your NFT'.'"}',
            'text'      => '{"fr":"'.'Comment devenir indépendant financièrement en créant votre propre NFT et en le revendant sur le marché secondaire.'.'","en":"'.'How to become financially independent by creating your own NFT and selling it on the secondary market.'.'"}'
        ]);

        Service::create([
            'icon'      => '<i class="bi bi-bezier"></i>',
            'title'     => '{"fr":"'.'Mes sources d’informations quotidiennes'.'","en":"'.'My daily news sources'.'"}',
            'text'      => '{"fr":"'.'Toutes mes références, où sinformer sur lactualité, les réseaux et les comptes à suivre.'.'","en":"'.'All my references, where to get information on news, networks and accounts to follow.'.'"}'
        ]);

        Service::create([
            'icon'      => '<i class="bi bi-bar-chart-line"></i>',
            'title'     => '{"fr":"'.'Mes tips marketing'.'","en":"'.'My marketing tips'.'"}',
            'text'      => '{"fr":"'.'Apprenez à mettre en ligne votre collection, multiplier vos ventes, tout en valorisant vos NFTs et en stimulant votre communauté.'.'","en":"'.'Learn how to put your collection online, multiply your sales, while enhancing your NFTs and stimulating your community.'.'"}'
        ]);

    }
}
