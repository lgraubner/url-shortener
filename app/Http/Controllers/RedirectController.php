<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Click;
use App\Models\Link;

class RedirectController extends Controller
{
    /**
     * @param $hash
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($hash, Request $request)
    {
        $link = Link::domain()->where('hash', $hash)->firstOrFail();

        $click = new Click;
        $referrer = $request->headers->get('referer');

        if ($referrer) {
            $click->referrer = $referrer;
        }
        $link->clicks()->save($click);

        if ($link->is_safe) {
            return redirect()->away($link->long_url, 301);
        }

        return view('unsafe', [
            'url' => $link->long_url
        ]);
    }
}
