<?php

namespace App\Http\Controllers;

use App\Models\ReseauManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReseauManagerController extends Controller
{
    public function index()
    {
        $reseaux = ReseauManager::all();
        return response()->json(['reseaux' => $reseaux], 200);
    }

    public function store(Request $request)
    {
        // Validez les données du formulaire ici
        $validator = Validator::make($request->all(), [
            'nom_de_la_personne_a_remplacer' => 'required',
            'prenom_de_la_personne_a_remplacer' => 'required',
            'service' => 'required',
            'horaire' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Créez un nouveau gestionnaire de réseau
        $reseau = new ReseauManager([
            'nom_de_la_personne_a_remplacer' => $request->nom_de_la_personne_a_remplacer,
            'prenom_de_la_personne_a_remplacer' => $request->prenom_de_la_personne_a_remplacer,
            'service' => $request->service,
            'horaire' => $request->horaire,
        ]);

        // Gérez le téléchargement de l'image si fournie
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/reseaux', 'public');
            $reseau->image = $imagePath;
        }

        $reseau->save();

        return response()->json(['reseau' => $reseau, 'message' => 'Réseau ajouté avec succès.'], 201);
    }

    public function show($id)
    {
        $reseau = ReseauManager::findOrFail($id);
        return response()->json(['reseau' => $reseau], 200);
    }

    public function update(Request $request, $id)
    {
        // Validez les données du formulaire ici
        $validator = Validator::make($request->all(), [
            'nom_de_la_personne_a_remplacer' => 'required',
            'prenom_de_la_personne_a_remplacer' => 'required',
            'service' => 'required',
            'horaire' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $reseau = ReseauManager::findOrFail($id);

        // Mettez à jour les données du gestionnaire de réseau
        $reseau->nom_de_la_personne_a_remplacer = $request->nom_de_la_personne_a_remplacer;
        $reseau->prenom_de_la_personne_a_remplacer = $request->prenom_de_la_personne_a_remplacer;
        $reseau->service = $request->service;
        $reseau->horaire = $request->horaire;

        // Gérez la mise à jour de l'image si fournie
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images/reseaux', 'public');
        //     $reseau->image = $imagePath;
        // }

        $reseau->save();

        return response()->json(['reseau' => $reseau, 'message' => 'Réseau mis à jour avec succès.'], 200);
    }

    public function destroy($id)
    {
        $reseau = ReseauManager::findOrFail($id);
        $reseau->delete();

        return response()->json(['message' => 'Réseau supprimé avec succès.'], 200);
    }
}
