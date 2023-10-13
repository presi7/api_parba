<?php

namespace App\Http\Controllers;

use App\Models\DetailsMissionManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DetailsMissionManagerController extends Controller
{
    public function index()
    {
        $detailsMissions = DetailsMissionManager::all();
        return response()->json(['detailsMissions' => $detailsMissions]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Type_de_mission' => 'required',
            'Etablissement' => 'required',
            'Service' => 'required',
            'Date_et_Horaire' => 'required',
            'Profil_recherche' => 'required',
            'Motif' => 'required',
            'Remplacant' => 'required',
            'Personne_remplacee' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $detailsMission = DetailsMissionManager::create($request->all());

        return response()->json(['message' => 'Détails de la Mission Manager créés avec succès.']);
    }

    public function show($id)
    {
        $detailsMission = DetailsMissionManager::findOrFail($id);
        return response()->json(['detailsMission' => $detailsMission]);
    }

    public function update(Request $request, $id)
    {
        $detailsMission = DetailsMissionManager::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'Type_de_mission' => 'required',
            'Etablissement' => 'required',
            'Service' => 'required',
            'Date_et_Horaire' => 'required',
            'Profil_recherche' => 'required',
            'Motif' => 'required',
            'Remplacant' => 'required',
            'Personne_remplacee' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $detailsMission->update($request->all());

        return response()->json(['message' => 'Détails de la Mission Manager mis à jour avec succès.']);
    }

    public function destroy($id)
    {
        $detailsMission = DetailsMissionManager::findOrFail($id);
        $detailsMission->delete();

        return response()->json(['message' => 'Détails de la Mission Manager supprimés avec succès.']);
    }
}
