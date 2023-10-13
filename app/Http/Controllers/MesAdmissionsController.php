<?php

namespace App\Http\Controllers;

use App\Models\MesAdmissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MesAdmissionsController extends Controller
{
    // Méthode pour afficher la liste des admissions personnelles
    public function index()
    {
        $mesAdmissions = MesAdmissions::all();
        return response()->json($mesAdmissions);
    }

    // Méthode pour afficher les détails d'une admission personnelle
    public function show($id)
    {
        $mesAdmission = MesAdmissions::findOrFail($id);
        return response()->json($mesAdmission);
    }

    // Méthode pour créer une nouvelle admission personnelle
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Structure' => 'required',
            'Code' => 'required',
            'Email' => 'required|email|unique:mes_admissions,Email',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $mesAdmission = MesAdmissions::create($request->all());
        return response()->json($mesAdmission, 201);
    }

    // Méthode pour mettre à jour une admission personnelle
    public function update(Request $request, $id)
    {
        $mesAdmission = MesAdmissions::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'Structure' => 'required',
            'Code' => 'required',
            'Email' => 'required|email|unique:mes_admissions,Email,' . $id,
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $mesAdmission->update($request->all());
        return response()->json($mesAdmission, 200);
    }

    // Méthode pour supprimer une admission personnelle
    public function destroy($id)
    {
        $mesAdmission = MesAdmissions::findOrFail($id);
        $mesAdmission->delete();

        return response()->json(null, 204);
    }

}
