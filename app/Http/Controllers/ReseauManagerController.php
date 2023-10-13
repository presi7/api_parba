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
            'nom' => 'required',
            'prenom' => 'required',
            'fonction' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Créez un nouveau gestionnaire de réseau
        $reseau = new ReseauManager([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'fonction' => $request->fonction,
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
            'nom' => 'required',
            'prenom' => 'required',
            'fonction' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $reseau = ReseauManager::findOrFail($id);

        // Mettez à jour les données du gestionnaire de réseau
        $reseau->nom = $request->nom;
        $reseau->prenom = $request->prenom;
        $reseau->fonction = $request->fonction;

        // Gérez la mise à jour de l'image si fournie
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/reseaux', 'public');
            $reseau->image = $imagePath;
        }

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
