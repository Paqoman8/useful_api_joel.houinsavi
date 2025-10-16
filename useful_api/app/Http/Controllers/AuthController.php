<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Auth;
use Dotenv\Exception\ValidationException;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => User::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(StoreUserRequest $request)
    {
        // $credentials = $request->validated();

        $user = User::create($request->validated()) ;

        $token = $user->createToken('useful_api')->plainTextToken;

        // return response()->json([
        //     'user' => new UserResource($user),
        //     'succes' => 'The new user has been registered with success...',
        //     'token' => $token
        // ],201);
        return response()->json(new UserResource($user),201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email',$request['email'])->first();

        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response()->json([
                'error' => 'Invalids credentials'
            ],401);
        }

        $token = $user->createToken('useful_api')->plainTextToken;

        // return response()->json([
        //     'user' => new UserResource($user),
        //     'succes' => 'You are now connected with success...',
        //     'token' => $token
        // ],200);
        return response()->json([
            'token' => $token,
            'user_id' => $user['id']
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function login(StoreUserRequest $request){

    //     $credentials = $request->validated();

    //     if(Auth::attempt($credentials)){
    //         $request->session()->regenerate();

    //         return response()->json([
    //             'succes'=>"Tout est super genial"
    //         ]);
    //     };

    //     throw ValidationException::withMessages([
    //         'email' => 'Erreur de contenu'
    //     ]);

    // }
}
