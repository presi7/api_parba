<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\InscriptionNouvelUser;
use App\Models\Login;



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
        try {
            $credentials = $request->only('email', 'password');

            // $user = InscriptionNouvelUser::where('email', $credentials['email'])
            //     ->select('id', 'password')
            //     ->first();

            $user = InscriptionNouvelUser::where('email', $credentials['email'])
                ->select('id', InscriptionNouvelUser::PASSWORD) // Utilisez la constante PASSWORD
                ->first();


            if (!$user) {
                \Log::warning('User not found for email: ' . $credentials['email']);
                return response()->json(['error' => 'Identifiants incorrects'], 401);
            }

            if (Hash::check($credentials['password'], $user->password)) {
                \Log::info('Password matched for user: ' . $credentials['email']);
                return response()->json(['message' => 'Connexion réussie']);
            }

            \Log::warning('Password mismatch for user: ' . $credentials['email']);
            return response()->json(['error' => 'Identifiants incorrects'], 401);
        } catch (\Exception $e) {
            \Log::error('Error during password verification: ' . $e->getMessage());
            return response()->json(['error' => 'Une erreur s\'est produite lors de la connexion'], 500);
        }
    }

//     public function authenticate(Request $request)
// {
//     // Valider les données du formulaire de connexion
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     // Récupérer l'utilisateur en fonction de l'adresse e-mail
//     $user = User::where('email', $request->email)->first();

//     // Vérifier si l'utilisateur existe et si le mot de passe est correct
//     if ($user && Hash::check($request->password, $user->password)) {
//         // Authentification réussie
//         auth()->login($user); // Vous connectez l'utilisateur
//         return redirect()->intended('/dashboard'); // Redirigez l'utilisateur vers le tableau de bord
//     } else {
//         // Authentification échouée
//         return redirect()->route('login')->with('error', 'Adresse e-mail ou mot de passe incorrect');
//     }
// }

}



