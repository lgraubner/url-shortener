<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Http\Resources\Link as LinkResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tuupola\Base62Proxy as Base62;

class LinkController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        return LinkResource::collection(Link::all());
    }

    /**
     * @param $hash
     * @return LinkResource
     */
    public function show($id) {
        $link = Link::findOrFail($id);
        return new LinkResource($link);
    }

    /**
     * @param Request $request
     * @return LinkResource|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'hash' => 'unique:links|max:20',
            'long_url' => 'required|url'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'error' => [
                    'status' => 400,
                    'description' => 'There are one or more validation errors.',
                    'fields' => $errors
                ]
            ], 400);
        }

        $user = Auth::user();

        $link = new Link;

        $next_id = DB::table('links')->max('id') + 1;

        // @TODO: check if hash doesn't exist

        $link->domain = $request->input('domain', env('APP_URL'));
        $link->hash = $request->input('hash', Base62::encode($next_id));
        $link->long_url = $request->input('long_url');

        $user->links()->save($link);

        return new LinkResource($link);
    }

    /**
     * @param $id
     * @param Request $request
     * @return LinkResource|\Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request) {
        $link = Link::findOrFail($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'hash' => 'unique:links|max:20',
            'long_url' => 'url'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json([
                'error' => [
                    'status' => 400,
                    'description' => 'There are one or more validation errors.',
                    'fields' => $errors
                ]
            ], 400);
        }

        $link->fill($input)->save();

        return new LinkResource($link);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) {
        Link::findOrFail($id)->delete();

        return response()->json([
            'data' => null
        ]);
    }
}
