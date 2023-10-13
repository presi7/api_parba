<?php

namespace App\Http\Controllers;

use App\Models\InscriptionRemplacant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class InscriptionRemplacantController extends Controller
{
    // Méthode pour afficher la liste des remplacants
    public function index()
    {
        $remplacants = InscriptionRemplacant::all();
        return response()->json($remplacants);
    }

    // Méthode pour afficher un remplacant par son ID
    public function show($id)
    {
        $remplacant = InscriptionRemplacant::findOrFail($id);
        return response()->json($remplacant);
    }

    // Méthode pour créer un nouveau remplacant
    public function store(Request $request)
    {
        // Valider les données d'entrée
        $validator = Validator::make($request->all(), [
            'Structure' => 'required|string',
            'Statut' => 'required|string',
            'Metiers' => 'required|string',
            'Competences' => 'required|string',
            'Jour' => 'required|string',
            'Nuit' => 'required|string',
            'nouveluser_id' => 'required|exists:inscription_nouvelusers,id', // Assurez-vous que l'id existe dans la table "inscription_nouvelusers"
        ]);

        // Si la validation échoue, renvoyer une réponse d'erreur
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Créer un remplacant si la validation réussit
        $remplacant = InscriptionRemplacant::create($request->all());
        return response()->json($remplacant, 201);
    }

    // Méthode pour mettre à jour un remplacant
    public function update(Request $request, $id)
    {
         // Valider les données d'entrée
         $validator = Validator::make($request->all(), [
            'Structure' => 'required|string',
            'Statut' => 'required|string',
            'Metiers' => 'required|string',
            'Competences' => 'required|string',
            'Jour' => 'required|string',
            'Nuit' => 'required|string',
            'nouveluser_id' => 'required|exists:inscription_nouvelusers,id', // Assurez-vous que l'id existe dans la table "inscription_nouvelusers"
        ]);

        // Si la validation échoue, renvoyer une réponse d'erreur
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $remplacant = InscriptionRemplacant::findOrFail($id);
        $remplacant->update($request->all());

        return response()->json($remplacant, 200);
    }

    // Méthode pour supprimer un remplacant
    public function destroy($id)
    {
        $remplacant = InscriptionRemplacant::findOrFail($id);
        $remplacant->delete();
        return response()->json(null, 204);
    }
}
