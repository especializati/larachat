<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePhoto;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\UpdateUserPreference;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileApiController extends Controller
{
    public function me(Request $request)
    {
        return new UserResource($request->user());
    }

    public function updatePhoto(UpdatePhoto $request)
    {
        $user = $request->user();

        if ($user->image && Storage::exists($user->image)) {
            Storage::delete($user->image);
        }

        if ($path = $request->image->store('users/profile')) {
            $user->update(['image' => $path]);

            return response()->json(['message' => 'success']);
        }

        return response()->json(['message' => 'fail'], 500);
    }

    public function update(UpdateProfile $request)
    {
        $request->user()->update($request->only(['name']));

        return response()->json(['message' => 'success']);
    }

    public function updatePreference(UpdateUserPreference $request)
    {
        $preference = $request->user()->preference()->firstOrCreate();

        $preference->update([
            'me_notify' => $request->me_notify
        ]);

        return response()->json(['message' => 'success']);
    }

    public function updatePreferenceImageChat(UpdatePhoto $request)
    {
        $preference = $request->user()->preference()->firstOrCreate();

        if ($path = $request->image->store('users/chat')) {
            $preference->update([
                'image_background_chat' => $path
            ]);

            return response()->json(['message' => 'success']);
        }

        if ($preference->image_background_chat && Storage::exists($preference->image_background_chat)) {
            Storage::delete($preference->image_background_chat);
        }

        return response()->json(['message' => 'fail'], 500);
    }

    public function removeImageChat(Request $request)
    {
        $preference = $request->user()->preference()->firstOrCreate();

        if ($preference->image_background_chat && Storage::exists($preference->image_background_chat)) {
            Storage::delete($preference->image_background_chat);
        }

        $preference->update([
            'image_background_chat' => ''
        ]);

        return response()->json(['message' => 'success']);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'success']);
    }
}
