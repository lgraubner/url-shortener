<?php

namespace App\Http\Controllers;

use App\Click;
use Illuminate\Http\Request;
use App\Link;

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

        return redirect()->away($link->long_url, 301);
    }
}
