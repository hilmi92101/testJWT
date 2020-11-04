<?php

namespace App\Http\Controllers\Api\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:api_superadmin');
    }
    
    public function index()
    {

		return response()->json([

        	'success' => true,
        	'message' => 'You are in the dashboard',

        ], 200);

    }
}
