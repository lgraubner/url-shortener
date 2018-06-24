<?php

namespace App\Http\Controllers;

use App\Click;
use Illuminate\Http\Request;
use App\Link;
use Jenssegers\Agent\Facades\Agent;

class RedirectController extends Controller
{
    public function redirect($hash, Request $request)
    {
        $link = Link::where('hash', $hash)->firstOrFail();

        $click = new Click;
        $referrer = $request->headers->get('referer');

        if ($referrer) {
            $click->referrer = $referrer;
        }
        $link->clicks()->save($click);

        // @TODO: track app redirects?

        if (Agent::isiOS() && $link->play_store_url) {
            return redirect()->away($link->app_store_url, 301);
        } else if (Agent::isAndroidOS() && $link->app_store_url) {
            return redirect()->away($link->play_store_url, 301);
        }

        return redirect()->away($link->long_url, 301);
    }
}
