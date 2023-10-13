<?php

namespace App\Http\Controllers;

use App\Models\Voir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoirController extends Controller
{
    // Méthode pour afficher la liste des détails "Voir"
    public function index()
    {
        $voirDetails = Voir::all();
        return response()->json($voirDetails);
    }

    // Méthode pour afficher un détail "Voir" par son ID
    public function show($id)
    {
        $voirDetail = Voir::findOrFail($id);
        return response()->json($voirDetail);
    }

    // Méthode pour créer un nouveau détail "Voir"
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
            'Personne remplacée' => 'required',
            // Ajoutez les règles de validation pour les autres colonnes si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $voirDetail = Voir::create($request->all());
        return response()->json($voirDetail, 201);
    }

    // Méthode pour mettre à jour un détail "Voir"
    public function update(Request $request, $id)
    {
        $voirDetail = Voir::findOrFail($id);

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
            'Personne remplacée' => 'required',
            // Ajoutez les règles de validation pour les autres colonnes si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $voirDetail->update($request->all());
        return response()->json($voirDetail, 200);
    }

    // Méthode pour supprimer un détail "Voir"
    public function destroy($id)
    {
        $voirDetail = Voir::findOrFail($id);
        $voirDetail->delete();
        return response()->json(null, 204);
    }
}
