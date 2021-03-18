<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class FavoriteApiController extends Controller
{
    public function myFavorites(Request $request)
    {
        $users = $request->user()
                            ->favorites()
                            ->inRandomOrder()
                            ->get();

        return UserResource::collection($users);
    }

    public function store(StoreFavoriteRequest $request)
    {
        $request->user()->favorites()->sync(
            $request->user()->favorites->pluck('id')->push($request->user)
        );

        return response()->json(['message' => 'success'], 201);
    }

    public function destroy(StoreFavoriteRequest $request)
    {
        $request->user()->favorites()->detach($request->user);

        return response()->json([], 204);
    }
}
