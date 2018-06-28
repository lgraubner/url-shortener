<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Link;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function __invoke($hash, Request $request)
    {
        $link = Link::domain()->where('hash', $hash)->firstOrFail();

        return view('details', [
            'long_url' => $link->long_url,
            'created_at' => Carbon::parse($link->created_at)->format('M j, Y'),
            'clicks' => $link->clicks->count(),
            'title' => $link->title
        ]);
    }
}
