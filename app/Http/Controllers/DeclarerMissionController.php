<?php

namespace App\Http\Controllers;

use App\Models\DeclarerMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeclarerMissionController extends Controller
{
    // Méthode pour afficher la liste des missions déclarées
    public function index()
    {
        $declarerMissions = DeclarerMission::all();
        return response()->json(['declarerMissions' => $declarerMissions]);
    }

    // Méthode pour afficher les détails d'une mission déclarée
    public function show($id)
    {
        $declarerMission = DeclarerMission::findOrFail($id);
        return response()->json(['declarerMission' => $declarerMission]);
    }

    // Méthode pour créer une nouvelle mission déclarée
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Etablissement' => 'required',
            'Type' => 'required',
            'Date_de_Debut' => 'required|date',
            'Date_de_Fin' => 'required|date',
            'Heure_de_debut' => 'required|date_format:H:i',
            'Heure_de_Fin' => 'required|date_format:H:i',
            'Profil_recherche' => 'required',
            'Motif' => 'required',
            'Remplacant_selectionne' => 'required',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $declarerMission = DeclarerMission::create($request->all());
        return response()->json(['message' => 'Mission déclarée créée avec succès.', 'declarerMission' => $declarerMission]);
    }

    // Méthode pour mettre à jour une mission déclarée
    public function update(Request $request, $id)
    {
        $declarerMission = DeclarerMission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'Etablissement' => 'required',
            'Type' => 'required',
            'Date_de_Debut' => 'required|date',
            'Date_de_Fin' => 'required|date',
            'Heure_de_debut' => 'required|date_format:H:i',
            'Heure_de_Fin' => 'required|date_format:H:i',
            'Profil_recherche' => 'required',
            'Motif' => 'required',
            'Remplacant_selectionne' => 'required',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $declarerMission->update($request->all());
        return response()->json(['message' => 'Mission déclarée mise à jour avec succès.', 'declarerMission' => $declarerMission]);
    }

    // Méthode pour supprimer une mission déclarée
    public function destroy($id)
    {
        $declarerMission = DeclarerMission::findOrFail($id);
        $declarerMission->delete();

        return response()->json(['message' => 'Mission déclarée supprimée avec succès.']);
    }
}
