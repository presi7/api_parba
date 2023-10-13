<?php

namespace App\Http\Controllers;

use App\Models\PlusInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlusInfosController extends Controller
{
    public function index()
    {
        $plusInfos = PlusInfo::all();
        return response()->json(['plusInfos' => $plusInfos], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Structure' => 'required|string',
            'Statut' => 'required|string',
            'Matricule' => 'required|string',
            'EtatProfil' => 'required|string',
            'MetierEtCompetences' => 'required|string',
            'AccepteJour' => 'required|boolean',
            'AccepteNuit' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();

        $plusInfo = PlusInfo::create($validatedData);

        return response()->json(['plusInfo' => $plusInfo, 'message' => 'Informations "Plus d\'infos" ajoutées avec succès.'], 201);
    }

    public function show($id)
    {
        $plusInfo = PlusInfo::findOrFail($id);
        return response()->json(['plusInfo' => $plusInfo], 200);
    }

    public function update(Request $request, $id)
    {
        $plusInfo = PlusInfo::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'Structure' => 'required|string',
            'Statut' => 'required|string',
            'Matricule' => 'required|string',
            'EtatProfil' => 'required|string',
            'MetierEtCompetences' => 'required|string',
            'AccepteJour' => 'required|boolean',
            'AccepteNuit' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();

        $plusInfo->update($validatedData);

        return response()->json(['plusInfo' => $plusInfo, 'message' => 'Informations "Plus d\'infos" mises à jour avec succès.'], 200);
    }

    public function destroy($id)
    {
        $plusInfo = PlusInfo::findOrFail($id);
        $plusInfo->delete();

        return response()->json(['message' => 'Informations "Plus d\'infos" supprimées avec succès.'], 200);
    }
}
