<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Link;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function __invoke($hash, Request $request)
    {
        $link = Link::withCurrentDomain()->where('hash', $hash)->firstOrFail();

        $clicks = $link->clicks()->where('created_at', '>=', Carbon::today()->subDays(21)->toDateString())
            ->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('d-m-Y');
        })->map(function ($item, $key) {
            return [
                'clicks' => collect($item)->count(),
                'value' => $key ?: 'direct',
            ];
        })->reduce(function ($carry, $item) {
            array_push($carry, $item);
            return $carry;
        }, []);

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
