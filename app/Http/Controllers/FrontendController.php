<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Convert;
use App\Models\ConvertImage;
use App\Models\ConvertListItem;
use App\Models\Discord;
use App\Models\FAQ;
use App\Models\ImageConvert;
use App\Models\Pricing;
use App\Models\PricingList;
use App\Models\Service;
use App\Models\ServiceBanner;
use App\Models\Title;
use App\Models\ZikzakImage;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend_pages.index',[
            'banner'          => Banner::first(),
            'banner_title'    => json_decode(Banner::first()->banner_title),
            'banner_text'     => json_decode(Banner::first()->banner_text),
            'button_text'     => json_decode(Banner::first()->button_text),

            'convert'         => Convert::first(),
            'convert_title'   => json_decode(Convert::first()->title),
            'convertimages'   => ConvertImage::all(),
            'convertitems'    => ConvertListItem::all(),

            'services'        => Service::all(),
            'service_banner'  => ServiceBanner::first(),

            'title'           => Title::first(),
            'title_pr'        => json_decode(Title::first()->pricing_title),
            'title_faq'       => json_decode(Title::first()->faq_title),
            
            'faqs'            => FAQ::all(),
            'pricing'         => Pricing::all(),
            'pricinglist'     => PricingList::all(),
            'zikzak'          => ZikzakImage::first(),
            'imageconvert'    => ImageConvert::first(),
        ]);
    }

    public function subscribe(){
        return view('frontend_pages.subscribe',[
            'discord_info' => Discord::all(),
        ]);
    }
}
