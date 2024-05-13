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
            'type' => 'required',
            'structure' => 'required',
            'service' => 'required',
            'debut' => 'required|date',
            'fin' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'profil' => 'required',
            'motif' => 'required',
            'nom_de_la_personne_a_remplacer' => 'required',
            'prenom_de_la_personne_a_remplacer' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $mission = CreerMission::create($request->all());

        return response()->json(['data' => $mission], 201);
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
            'type' => 'required',
            'structure' => 'required',
            'service' => 'required',
            'debut' => 'required|date',
            'fin' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'profil' => 'required',
            'motif' => 'required',
            'nom_de_la_personne_a_remplacer' => 'required',
            'prenom_de_la_personne_a_remplacer' => 'required',
            // 'missions_manager_id'=> 'required',
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
