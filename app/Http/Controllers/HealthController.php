<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class HealthController
 * @package App\Http\Controllers
 */
class HealthController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        if ($request->query('key') !== env('HEALTH_KEY')) {
            return response()->json([
                'error' => [
                    'status' => 403,
                    'description' => 'Unauthenticated.'
                ]
            ], 403);
        }

        return response()->json([
            'status' => 'running'
        ]);
    }
}
