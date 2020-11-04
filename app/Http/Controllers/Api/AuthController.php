<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'passwordGenerator']]);
    }

    public function login(Request $request)
    {
        /*$credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);*/

        $credentials = $request->only('email', 'password');
        if(!$token = JWTAuth::attempt($credentials)){
        	 return response()->json([
        	 	"success" => false
        	 ], 401);
        }

        return response()->json([
			"success" => true,
			"token" => $token,
            "user" => Auth::user(),
		], 200); 
    }

    public function checkToken()
    {
    	return response()->json([
			"success" => true,
		], 200); 
    }

    public function logout()
    {
        $logout = auth()->logout();

        return response()->json([

        	'success' => true,
        	'message' => 'Successfully logged out',

        ], 200);
    }


    public function passwordGenerator()
    {
    	return Hash::make('1q2w3e4r');
    }
}
