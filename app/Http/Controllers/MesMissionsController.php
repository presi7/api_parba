<?php

namespace App\Http\Controllers;

use App\Models\MesMissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MesMissionsController extends Controller
{
      // Méthode pour afficher la liste des missions personnelles
    public function index()
    {
        $mesMissions = MesMissions::all();
        return response()->json($mesMissions);
    }

    // Méthode pour afficher les détails d'une mission personnelle par son ID
    public function show($id)
    {
        $mesMission = MesMissions::findOrFail($id);
        return response()->json($mesMission);
    }

    // Méthode pour créer une nouvelle mission personnelle
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Reference' => 'required',
            'Date' => 'required|date',
            'Debut' => 'required|date_format:H:i',
            'Fin' => 'required|date_format:H:i',
            'Structure' => 'required',
            'Service' => 'required',
            'Etat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $mesMission = MesMissions::create($request->all());
        return response()->json($mesMission, 201);
    }

    // Méthode pour mettre à jour une mission personnelle par son ID
    public function update(Request $request, $id)
    {
        $mesMission = MesMissions::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'Reference' => 'required',
            'Date' => 'required|date',
            'Debut' => 'required|date_format:H:i',
            'Fin' => 'required|date_format:H:i',
            'Structure' => 'required',
            'Service' => 'required',
            'Etat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $mesMission->update($request->all());
        return response()->json($mesMission, 200);
    }

    // Méthode pour supprimer une mission personnelle par son ID
    public function destroy($id)
    {
        $mesMission = MesMissions::findOrFail($id);
        $mesMission->delete();

        return response()->json(null, 204);
    }
}
