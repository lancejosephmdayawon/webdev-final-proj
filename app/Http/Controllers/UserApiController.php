<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
