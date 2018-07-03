<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkInfoController extends Controller
{
    public function __invoke($id)
    {
        $link = Link::fromUser()->findOrFail($id);

        return response()->json([
            'data' => $link->info
        ]);

    }
}
