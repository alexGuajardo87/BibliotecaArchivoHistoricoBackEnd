<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Traits\ApiResponser;

class LoginController extends Controller
{
  use ApiResponser;

  public function login(Request $request)
  {
    echo "ad";

        if (!Auth::attempt(['usuario' => $request->Usuario, 'password' => $request->Contrasena])){
                return response()->json([
                    'message' => 'Usuario o Password incorrectos'.$request->Usuario."  ".Hash::make($request->Contrasena)
                ], 401);
        }else
        {
            return $token = $request->user()->createToken($request->Usuario)->plainTextToken;
        }
  }
}
