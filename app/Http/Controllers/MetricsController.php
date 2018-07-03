<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Carbon\Carbon;

class MetricsController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clicks($id)
    {
        $link = Link::fromUser()->findOrFail($id);

        $total = $link->clicks->count();

        $clicks = $link->clicks->groupBy(function ($date) {
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

        return response()->json([
            'data' => [
                'type' => 'clicks_per_day',
                'metrics' => $clicks,
                'total_clicks' => $total
            ]
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function referrers($id)
    {
        $link = Link::fromUser()->findOrFail($id);

        $clicks = $link->clicks->groupBy('referrer')->map(function ($item, $key) {
            return [
                'clicks' => collect($item)->count(),
                'value' => $key ?: 'direct',
            ];
        })->reduce(function ($carry, $item) {
            array_push($carry, $item);
            return $carry;
        }, []);

        return response()->json([
            'data' => [
                'type' => 'referrer',
                'metrics' => $clicks
            ]
        ]);
    }
}
