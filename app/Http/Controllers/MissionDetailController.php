<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\MissionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MissionDetailController extends Controller
{
    // Méthode pour afficher la liste des détails de mission
    public function index()
    {
        $details = MissionDetail::all();
        return response()->json($details);
    }

    // Méthode pour afficher un détail de mission par son ID
    public function show($id)
    {
        $detail = MissionDetail::findOrFail($id);
        return response()->json($detail);
    }

    // Méthode pour créer un nouveau détail de mission
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mission_id' => 'required|exists:missions,id',
            'Type' => 'required',
            'Etablissement' => 'required',
            'Service' => 'required',
            'Date Debut' => 'required',
            'Date Fin' => 'required',
            'Heure Debut' => 'required',
            'Heure Fin' => 'required',
            'Profil recherché' => 'required',
            'Motif' => 'required',
            'Remplacant' => 'required',
            'Personne remplacé' => 'required',
            // Ajoutez les règles de validation pour les autres colonnes ici
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $detail = MissionDetail::create($request->all());
        return response()->json($detail, 201);
    }

    // Méthode pour mettre à jour un détail de mission
    public function update(Request $request, $id)
    {
        $detail = MissionDetail::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'mission_id' => 'required|exists:missions,id',
            'Type' => 'required',
            'Etablissement' => 'required',
            'Service' => 'required',
            'Date Debut' => 'required',
            'Date Fin' => 'required',
            'Heure Debut' => 'required',
            'Heure Fin' => 'required',
            'Profil recherché' => 'required',
            'Motif' => 'required',
            'Remplacant' => 'required',
            'Personne remplacé' => 'required',
            // Ajoutez les règles de validation pour les autres colonnes ici
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $detail->update($request->all());
        return response()->json($detail, 200);
    }

    // Méthode pour supprimer un détail de mission
    public function destroy($id)
    {
        $detail = MissionDetail::findOrFail($id);
        $detail->delete();
        return response()->json(null, 204);
    }
}
