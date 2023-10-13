<?php

namespace App\Http\Controllers;

use App\Models\ProfileDePlusInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProfileDePlusInfoController extends Controller
{
    public function index()
    {
        $profiles = ProfileDePlusInfo::all();
        return response()->json(['profiles' => $profiles], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Structure' => 'required',
            'Statut' => 'required',
            'Matricule' => 'required',
            'EtatProfil' => 'required',
            'MetierEtCompetences' => 'required',
            'AccepteJour' => 'required|boolean',
            'AccepteNuit' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();
        $profile = ProfileDePlusInfo::create($validatedData);

        return response()->json(['profile' => $profile, 'message' => 'Profile de Plus Infos ajouté avec succès.'], 201);
    }

    public function show($id)
    {
        $profile = ProfileDePlusInfo::findOrFail($id);
        return response()->json(['profile' => $profile], 200);
    }

    public function update(Request $request, $id)
    {
        $profile = ProfileDePlusInfo::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'Structure' => 'required',
            'Statut' => 'required',
            'Matricule' => 'required',
            'EtatProfil' => 'required',
            'MetierEtCompetences' => 'required',
            'AccepteJour' => 'required|boolean',
            'AccepteNuit' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();
        $profile->update($validatedData);

        return response()->json(['profile' => $profile, 'message' => 'Profile de Plus Infos mis à jour avec succès.'], 200);
    }

    public function destroy($id)
    {
        $profile = ProfileDePlusInfo::findOrFail($id);
        $profile->delete();

        return response()->json(['message' => 'Profile de Plus Infos supprimé avec succès.'], 200);
    }
}
