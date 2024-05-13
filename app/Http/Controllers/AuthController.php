<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => ['required', 'string', Rule::in(['manager', 'admin'])], // Ajoutez une validation pour le champ 'role'
        ]);

        // Créer un nouvel utilisateur
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'password'=>$request->password,
            'role' => $request->role // Définir le rôle de l'utilisateur en fonction de la valeur fournie dans la requête
        ]);

        // Enregistrer l'utilisateur dans la base de données
        $user->save();

        // Retourner une réponse réussie
        return response()->json(['message' => 'Utilisateur créé avec succès'], 201);
    }
    // public function login(Request $request)
    // {
    //     // Validation des données
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     // Tentative de connexion de l'utilisateur
    //     if (!Auth::attempt($request->only('email', 'password'))) {
    //         // Retourner une erreur si la connexion échoue
    //         return response()->json(['message' => 'Identifiants incorrects'], 401);
    //     }

    //     // Récupérer l'utilisateur connecté
    //     $user = Auth::user();

    //     // Générer un jeton d'authentification
    //     $token = $user->createToken('TokenName')->accessToken;

    //     // Retourner le jeton
    //     return response()->json(['token' => $token], 200);
    // }

    public function login(Request $request)
{
    // Validation des données
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Tentative de connexion de l'utilisateur
    if (!Auth::attempt($request->only('email', 'password'))) {
        // Retourner une erreur si la connexion échoue
        return response()->json(['message' => 'Identifiants incorrects'], 401);
    }

    // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Générer un jeton d'authentification
    $token = $user->createToken('TokenName')->accessToken;

    // Retourner le jeton
    return response()->json(['token' => $token], 200);
}


    public function logout(Request $request)
    {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Révoquer tous les jetons d'authentification de l'utilisateur
        $user->tokens()->delete();

        // Retourner une réponse réussie
        return response()->json(['message' => 'Déconnexion réussie']);
    }
}
