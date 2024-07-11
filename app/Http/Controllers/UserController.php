<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return new UserCollection($users);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('reviews')->findOrFail($id);
        return new UserResource($user);
    }

    public function unfollow($id)
    {
        $user = auth()->user();
        $userToUnfollow = User::findOrFail($id);

        $user->following()->detach($userToUnfollow->id);

        return response()->json(['message' => 'User unfollowed successfully'], 200);
    }

    public function following(Request $request)
    {
        $user = auth()->user();
        $following = $user->following()->paginate(10);
        return new UserCollection($following);
    }

    public function followers(Request $request)
    {
        $user = auth()->user();
        $followers = $user->followers()->paginate(10);
        return new UserCollection($followers);
    }

    public function follow($id)
    {
        $user = auth()->user();
        $userToFollow = User::findOrFail($id);

        if ($user->id === $userToFollow->id) {
            return response()->json(['message' => 'You cannot follow yourself'], 400);
        }

        $user->following()->attach($userToFollow->id);

        return response()->json(['message' => 'User followed successfully'], 200);
    }
}
