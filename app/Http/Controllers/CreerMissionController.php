<?php

namespace App\Http\Controllers;

use App\Models\CreerMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreerMissionController extends Controller
{
    // Méthode pour afficher la liste des missions créées
    public function index()
    {
        $missions = CreerMission::all();
        return response()->json($missions);
    }

    // Méthode pour créer une nouvelle mission
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Type' => 'required',
            'Structure' => 'required',
            'Service' => 'required',
            'Debut' => 'required|date',
            'Fin' => 'required|date',
            'Heure_de_Debut' => 'required',
            'Heure_de_Fin' => 'required',
            'Profil' => 'required',
            'Motif' => 'required',
            'Nom_de_la_personne_a_remplacer' => 'required',
            'Prenom_de_la_personne_a_remplacer' => 'required',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $mission = CreerMission::create($request->all());
        return response()->json($mission, 201);
    }

    // Méthode pour afficher les détails d'une mission créée
    public function show($id)
    {
        $mission = CreerMission::findOrFail($id);
        return response()->json($mission);
    }

    // Méthode pour mettre à jour une mission créée
    public function update(Request $request, $id)
    {
        $mission = CreerMission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'Type' => 'required',
            'Structure' => 'required',
            'Service' => 'required',
            'Debut' => 'required|date',
            'Fin' => 'required|date',
            'Heure_de_Debut' => 'required',
            'Heure_de_Fin' => 'required',
            'Profil' => 'required',
            'Motif' => 'required',
            'Nom_de_la_personne_a_remplacer' => 'required',
            'Prenom_de_la_personne_a_remplacer' => 'required',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $mission->update($request->all());
        return response()->json($mission, 200);
    }

    // Méthode pour supprimer une mission créée
    public function destroy($id)
    {
        $mission = CreerMission::findOrFail($id);
        $mission->delete();

        return response()->json(['message' => 'Mission supprimée avec succès'], 200);
    }
}
