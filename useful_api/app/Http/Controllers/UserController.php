<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::paginate(2);
        $users = User::all();

        return response()->json([
            'data' => UserResource::collection($users),
            'succes' => 'Users fetched with success...',
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated()) ;

        return response()->json([
            'user' => new UserResource($user),
            'succes' => 'The new user has been registered with success...'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return response()->json([
            'user' => new UserResource($user),
            'succes' => 'The user you asked for...'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json([
            'user' => new UserResource($user),
            'succes' => 'The user has been updated with success...'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'succes' => 'The user has been deleted with success...'
        ]);
    }
}
