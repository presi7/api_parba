<?php

namespace App\Http\Controllers;

use App\Models\MissionsManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MissionsManagerController extends Controller
{

    // Méthode pour afficher la liste des missions manager
    public function index()
    {
        $missionsManagers = MissionsManager::all();
        return $missionsManagers;
    }

    // Méthode pour afficher les détails d'une mission manager
    public function show($id)
    {
        $missionsManager = MissionsManager::findOrFail($id);
        return $missionsManager;
    }

    // Méthode pour créer une nouvelle mission manager
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NumMission' => 'required',
            'Date' => 'required|date',
            'PourvueOuNon' => 'required|boolean',
            'AnnuleOuNon' => 'required|boolean',
            'Administrateur' => 'required',
            'Remplacant' => 'required',
            'Etablissement' => 'required',
            'Service' => 'required',
            'ChoixDuMetier' => 'required',
            'JourNuit' => 'required',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $missionsManager = MissionsManager::create($request->all());
        return response()->json(['message' => 'Mission Manager créée avec succès'], 201);
    }

    // Méthode pour mettre à jour une mission manager
    public function update(Request $request, $id)
    {
        $missionsManager = MissionsManager::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'NumMission' => 'required',
            'Date' => 'required|date',
            'PourvueOuNon' => 'required|boolean',
            'AnnuleOuNon' => 'required|boolean',
            'Administrateur' => 'required',
            'Remplacant' => 'required',
            'Etablissement' => 'required',
            'Service' => 'required',
            'ChoixDuMetier' => 'required',
            'JourNuit' => 'required',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $missionsManager->update($request->all());
        return response()->json(['message' => 'Mission Manager mise à jour avec succès'], 200);
    }

    // Méthode pour supprimer une mission manager
    public function destroy($id)
    {
        $missionsManager = MissionsManager::findOrFail($id);
        $missionsManager->delete();

        return response()->json(['message' => 'Mission Manager supprimée avec succès'], 200);
    }
}
