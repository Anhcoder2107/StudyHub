<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Exception\RuntimeException;
use Tymon\JWTAuth\JWTGuard;


use App\Models\Users;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $guard = Auth('api');
        if (! $guard instanceof JWTGuard) {
            throw new RuntimeException('Wrong guard returned.');
        }
        //create a new user
        $user = new Users();
        $user->name =  $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->role = $request['role'];
        $user->save();

        $token = $guard->login($user);
        return $this->respondWithToken($token)->header('Authorization', $token);


        // return response()->json([
        //     'message' => 'User created successfully',
        //     'status' => '200'
        // ], 200);

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

    public function refresh()
    {
        $guard = Auth('api');
        if (! $guard instanceof JWTGuard) {
            throw new RuntimeException('Wrong guard returned.');
        }

        return $this->respondWithToken($guard->refresh());
        // return ;
    }
  
    protected function respondWithToken($token)
    {
        $guard = Auth('api');
        if (! $guard instanceof JWTGuard) {
            throw new RuntimeException('Wrong guard returned.');
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $guard->factory()->getTTL() * 60,
            'status' => '200'
        ]);
    }
}
