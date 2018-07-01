<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Link;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function __invoke($hash, Request $request)
    {
        $link = Link::domain()->where('hash', $hash)->firstOrFail();

        // @TODO: group data
        $clicks = $link->clicks()->where('created_at', '>=', Carbon::today()->subDays(21)->toDateString())->get();

        return view('details', [
            'long_url' => $link->long_url,
            'created_at' => Carbon::parse($link->created_at)->format('M j, Y'),
            'clickCount' => $link->clicks->count(),
            'clicks' => $clicks,
            'title' => $link->title,
            'is_safe' => $link->is_safe
        ]);
    }
}
