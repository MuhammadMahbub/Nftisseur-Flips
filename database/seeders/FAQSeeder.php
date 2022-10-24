<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FAQ::create([
            'question'  => '{"fr":"'.'Cette formation est-elle faite pour moi ?'.'","en":"'.'Is this course for me?'.'"}',
            'answer'    => '{"fr":"'.'Si tu es débutant, ou avec des notions dans les NFTs, cette formation est faite pour toi. Si tu ne possèdes aucune connaissance, les premiers modules vont t’apprendre à te lancer dans les NFTs pour ensuite passer à l’investissement. Avec un minimum de compétence, tu auras directement accès à l’essentiel de mes recherches et la possibilité d’investir dans les meilleurs projets NFTs chaque semaine et multiplier tes gains.'.'","en":"'.'If you are a beginner, or have some knowledge of NFTs, this course is for you. If you have no knowledge, the first modules will teach you how to get started in NFTs and then move on to investing. With a minimum of skill, you will have direct access to the essentials of my research and the ability to invest in the best NFTs projects every week and multiply your earnings.'.'"}',
        ]);
        FAQ::create([
            'question' => '{"fr":"'.'Est-il vraiment possible de gagner sa vie avec les NFTs ?'.'","en":"'.'Is it really possible to make a living with NFTs?'.'"}',
            'answer'   => '{"fr":"'.'Bien sur ! Sinon nous n’aurions pas passé près d’un an à créer cette formation. Les NFTs sont un secteur très rentable quand on connait les pièges, les bons plans et les règles à s’imposer. Tout est une question d’informations et d’apprentissage. Et bonne nouvelle, je partage tout avec toi dans cette formation.'.'","en":"'.'Of course! Otherwise we wouldnt have spent almost a year creating this course. NFTs are a very profitable business when you know the pitfalls, the right plans and the rules to follow. Its all about information and learning. And good news, I am sharing everything with you in this training.'.'"}',
        ]);
        FAQ::create([
            'question' => '{"fr":"'.'Est-il vraiment possible de gagner sa vie avec les NFTs ?'.'","en":"'.'Is follow-up offered with the training?'.'"}',
            'answer'   => '{"fr":"'.'Question indispensable. Le suivi sera la pour ceux qui le souhaitent. Nous avons crée un groupe privatif pour suivre en direct les ventes, les achats et les créations de NFT. Vous aurez accès à une mine d’or d’informations hebdomadaires indispensable pour réussir.'.'","en":"'.'Essential question. The follow-up will be there for those who wish it. We have created a private group to follow the sales, purchases and creations of NFT live. You will have access to a goldmine of weekly information that is essential for success.'.'"}',
        ]);
        FAQ::create([
            'question' =>'{"fr":"'.'Après avoir passé ma carte bancaire que se passe t-il ?'.'","en":"'.'What happens after I swipe my credit card?'.'"}',
            'answer'   => '{"fr":"'.'Tu auras directement accès à la formation, tu recevras tes codes par email, et un lien pour t’inscrire sur la plateforme de la formation. Si tu es motivé et ambitieux, en moins de 72h tu pourras réaliser ton premier investissement NFT et potentiellement générer tes premiers euros.'.'","en":"'.'You will have direct access to the training, you will receive your codes by email, and a link to register on the training platform. If you are motivated and ambitious, in less than 72 hours you will be able to make your first NFT investment and potentially generate your first euros.'.'"}',
        ]);
        FAQ::create([
            'question' =>'{"fr":"'.'Ai-je besoin de la formation ou je peux tout trouver sur internet et YouTube ?'.'","en":"'.'Do I need the training or can I find everything on the internet and YouTube?'.'"}',
            'answer'   => '{"fr":"'.'Cette formation est unique pour deux choses. La première, chaque contenu est exclusif, crée suite à mes expériences personnelles acquises durant cette dernière année. La deuxième, investir dans les NFTs ou les créer impose chaque semaine des heures de recherches, de stimuler sa créativité et de maitriser ses émotions avant son budget. Autrement dit laisse moi te guider afin d’obtenir le contrôle de tes gains et maitriser ton portefeuille et tes investissements.'.'","en":"'.'This course is unique for two reasons. The first is that each piece of content is exclusive, created from my personal experiences over the past year. The second is that investing in or creating NFTs requires hours of research, creativity and emotional control before budgeting. In other words, let me guide you to get control of your earnings and master your portfolio and your investments.'.'"}',
        ]);
    }
}
