<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MissionController extends Controller
{
     // Méthode pour afficher la liste des missions
     public function index()
     {
         $missions = Mission::all();
         return response()->json($missions);
     }

     // Méthode pour afficher une mission par son ID
     public function show($id)
     {
         $mission = Mission::findOrFail($id);
         return response()->json($mission);
     }

     // Méthode pour créer une nouvelle mission
    public function store(Request $request)
    {
        // Validation des données entrées par l'utilisateur
        $validator = Validator::make($request->all(), [
            'NumMission' => 'required|string',
            'Date' => 'required|string',
            'Pourvue ou non' => 'required|string',
            'Annulé ou non' => 'required|string',
            'Administrateur' => 'required|string',
            'Remplacant' => 'required|string',
            'Etablissement' => 'required|string',
            'Service' => 'required|string',
            'Choix du metier' => 'required|string',
            'Jour/Nuit' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $mission = Mission::create($request->all());
        return response()->json($mission, 201);
    }

     // Méthode pour mettre à jour une mission
     public function update(Request $request, $id)
     {
         $mission = Mission::findOrFail($id);

         // Validation des données entrées par l'utilisateur
         $validator = Validator::make($request->all(), [
             'NumMission' => 'required|string',
             'Date' => 'required|string',
             'Pourvue ou non' => 'required|string',
             'Annulé ou non' => 'required|string',
             'Administrateur' => 'required|string',
             'Remplacant' => 'required|string',
             'Etablissement' => 'required|string',
             'Service' => 'required|string',
             'Choix du metier' => 'required|string',
             'Jour/Nuit' => 'required|string',
         ]);

         if ($validator->fails()) {
             return response()->json(['errors' => $validator->errors()], 400);
         }

         $mission->update($request->all());
         return response()->json($mission, 200);
     }

     // Méthode pour supprimer une mission
    public function destroy($id)
    {
        $mission = Mission::findOrFail($id);
        $mission->delete();
        return response()->json(null, 204);
    }
}
