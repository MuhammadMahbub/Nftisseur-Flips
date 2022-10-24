<?php

namespace App\Http\Controllers;

use App\Models\Discord;
use App\Models\Stripe as ModelsStripe;
use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function payment(Request $request)
    {
        // $discord_info = Discord::find($request->discord_id)->first();

        Stripe\Stripe::setApiKey('sk_test_51K9u2MKCicyz6BNdfiHQTq0CxhpXhkIMF5ThuDGBuhECeMaEOzETUupH3wnEUkoGKOhR7OsoZXFInLHXAdIoMDDD002CryCLe8');
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        // ModelsStripe::create ([
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "discord_id" => $request->discord_id,
        //     "amount" => $discord_info->price,
        //     "currency" => "usd",
        // ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
