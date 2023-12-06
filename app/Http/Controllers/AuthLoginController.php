<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\InscriptionNouvelUser;


// class AuthLoginController extends Controller
// {
//     public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     if (Auth::guard('web')->attempt($credentials)) {
//         return response()->json(['message' => 'Connexion réussie']);
//     }

//     return response()->json(['error' => 'Connexion échouée'], 401);
// }
// }

class AuthLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = InscriptionNouvelUser::where('email', $credentials['email'])
            ->select('id', 'Mot de passe') // Incluez ici les champs dont vous avez besoin
            ->first();

        if (!$user) {
            return response()->json(['error' => 'Identifiants incorrects'], 401);
        }


        if (Hash::check($credentials['password'], $user->{'Mot de passe'})) {

            return response()->json(['message' => 'Connexion réussie']);
        }

        return response()->json(['error' => 'Identifiants incorrects'], 401);
    }
}


