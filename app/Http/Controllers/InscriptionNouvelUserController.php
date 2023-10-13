<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InscriptionNouvelUser;
use Illuminate\Support\Facades\Validator;


class InscriptionNouvelUserController extends Controller
{
    // Méthode pour afficher la liste des utilisateurs
    public function index()
    {
        $utilisateurs = InscriptionNouvelUser::all();
        return response()->json($utilisateurs);
    }

    // Méthode pour afficher un utilisateur par son ID
    public function show($id)
    {
        $utilisateur = InscriptionNouvelUser::findOrFail($id);
        return response()->json($utilisateur);
    }

    // Méthode pour créer un nouvel utilisateur
    public function store(Request $request)
    {
        // Valider les données d'entrée
        $validator = Validator::make($request->all(), [
            'Prenom' => 'required|string',
            'Nom' => 'required|string',
            'N° Telephone' => 'required|string',
            'Email' => 'required|email|unique:inscription_nouvelusers', // Assurez-vous que l'email est unique dans la table "inscription_nouvelusers"
            'Code Structure' => 'required|string',
            'Mot de passe' => 'required|string',
            'Confirmer mot de passe' => 'required|string|same:Mot de passe', // Assurez-vous que le champ "Confirmer mot de passe" correspond au champ "Mot de passe"
        ]);

        // Si la validation échoue, renvoyer une réponse d'erreur
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Créer un nouvel utilisateur si la validation réussit
        $utilisateur = InscriptionNouvelUser::create($request->all());

        return response()->json($utilisateur, 201);
    }

    // Méthode pour mettre à jour un utilisateur
    public function update(Request $request, $id)
    {
         // Valider les données d'entrée
         $validator = Validator::make($request->all(), [
            'Prenom' => 'required|string',
            'Nom' => 'required|string',
            'N° Telephone' => 'required|string',
            'Email' => 'required|email|unique:inscription_nouvelusers,email,' . $id, // Assurez-vous que l'email est unique, sauf pour l'utilisateur en cours d'édition
            'Code Structure' => 'required|string',
            'Mot de passe' => 'required|string',
            'Confirmer mot de passe' => 'required|string|same:Mot de passe', // Assurez-vous que le champ "Confirmer mot de passe" correspond au champ "Mot de passe"
        ]);

        // Si la validation échoue, renvoyer une réponse d'erreur
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $utilisateur = InscriptionNouvelUser::findOrFail($id);
        $utilisateur->update($request->all());

        return response()->json($utilisateur, 200);
    }

    // Méthode pour supprimer un utilisateur
    public function destroy($id)
    {
        $utilisateur = InscriptionNouvelUser::findOrFail($id);
        $utilisateur->delete();
        return response()->json(null, 204);
    }
}
