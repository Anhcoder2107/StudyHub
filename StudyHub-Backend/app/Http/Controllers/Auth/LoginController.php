<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Exception\RuntimeException;
use Tymon\JWTAuth\JWTGuard;


use App\Models\Users;

class LoginController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all users
        $users = Users::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //api login

        // $user = Users::where('email', $request['email'])->first();
        // if (Auth::attempt(['email' => $request->email,'password' => $request['password']])) {
        //     Auth::login($user);
        //     return response()->json(Auth::user());
        // } else {
        //     return response()->json('no user found');
        // }

        // if(! $token = auth()->attempt($request->only('email', 'password'))){
        //     return response(null, 401);
        // }

        // return $this->respondWithToken($token);

        $credentials = request(['email', 'password']);
  
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
  
        return $this->respondWithToken($token);


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

   

    public function me()
    {
        return response()->json(auth('api')->user());
    }
  
    
    public function logout()
    {
        auth('api')->logout();
    
        return response()->json(['message' => 'Successfully logged out']);
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
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $guard->factory()->getTTL() * 60,
            'status' => '200'
        ])
        ->header('Authorization', $token)
        ->header('Access-Control-Expose-Headers', 'Authorization');
    }

   
}
