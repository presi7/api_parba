<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\InscriptionNouvelUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class InscriptionNouvelUserController extends Controller

{
    public function index()
    {
        $utilisateurs = InscriptionNouvelUser::all();
        return response()->json($utilisateurs);
    }

    public function show($id)
    {
        $utilisateur = InscriptionNouvelUser::findOrFail($id);
        return response()->json($utilisateur);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Prenom' => 'required|string',
            'Nom' => 'required|string',
            'N° Telephone' => 'required|string',
            'Email' => 'required|email|unique:inscription_nouvelusers',
            'Code Structure' => 'required|string',
            'Mot de passe' => 'required|string',
            'Confirmer mot de passe' => 'required|string|same:Mot de passe',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Hachez le mot de passe ici
        $password = Hash::make($request->input('Mot de passe'));

        // Créez un nouvel utilisateur avec le mot de passe haché
        $utilisateur = InscriptionNouvelUser::create([
            'Prenom' => $request->input('Prenom'),
            'Nom' => $request->input('Nom'),
            'N° Telephone' => $request->input('N° Telephone'),
            'Email' => $request->input('Email'),
            'Code Structure' => $request->input('Code Structure'),
            'Mot de passe' => $password,
            'Confirmer mot de passe' => $request->input('Confirmer mot de passe'),
        ]);

        return response()->json($utilisateur, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Prenom' => 'required|string',
            'Nom' => 'required|string',
            'N° Telephone' => 'required|string',
            'Email' => 'required|email|unique:inscription_nouvelusers,email,' . $id,
            'Code Structure' => 'required|string',
            'Mot de passe' => 'required|string',
            'Confirmer mot de passe' => 'required|string|same:Mot de passe',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $utilisateur = InscriptionNouvelUser::findOrFail($id);
        $utilisateur->update($request->all());

        return response()->json($utilisateur, 200);
    }

    public function destroy($id)
    {
        $utilisateur = InscriptionNouvelUser::findOrFail($id);
        $utilisateur->delete();
        return response()->json(null, 204);
    }
}
