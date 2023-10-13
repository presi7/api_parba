<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoirController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PlusInfosController;
use App\Http\Controllers\MesMissionsController;
use App\Http\Controllers\CreerMissionController;
use App\Http\Controllers\MesAdmissionsController;
use App\Http\Controllers\MissionDetailController;
use App\Http\Controllers\ReseauManagerController;
use App\Http\Controllers\DeclarerMissionController;
use App\Http\Controllers\MissionsManagerController;
use App\Http\Controllers\ProfileDePlusInfoController;
use App\Http\Controllers\DetailsMissionManagerController;
use App\Http\Controllers\InscriptionNouvelUserController;
use App\Http\Controllers\InscriptionRemplacantController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();




});

// Routes pour InscriptionNouvelUser
Route::get('/utilisateurs', [InscriptionNouvelUserController::class, 'index']);
Route::get('/utilisateurs/{id}', [InscriptionNouvelUserController::class, 'show']);
Route::post('/utilisateurs', [InscriptionNouvelUserController::class, 'store']);
Route::put('/utilisateurs/{id}', [InscriptionNouvelUserController::class, 'update']);
Route::delete('/utilisateurs/{id}', [InscriptionNouvelUserController::class, 'destroy']);


// Routes pour InscriptionRemplacant
Route::get('/remplacants', [InscriptionRemplacantController::class, 'index']);
Route::get('/remplacants/{id}', [InscriptionRemplacantController::class,'show']);
Route::post('/remplacants', [InscriptionRemplacantController::class,'store']);
Route::put('/remplacants/{id}', [InscriptionRemplacantController::class,'update']);
Route::delete('/remplacants/{id}', [InscriptionRemplacantController::class,'destroy']);


// Routes pour Mission
Route::get('/missions', [MissionController::class,'index']);
Route::get('/missions/{id}', [MissionController::class,'show']);
Route::post('/missions', [MissionController::class, 'store']);
Route::put('/missions/{id}', [MissionController::class, 'update']);
Route::delete('/missions/{id}', [MissionController::class, 'destroy']);


// Routes personnalisées pour les détails de mission
// Route::get('missions/{mission_id}/details', [MissionDetailController::class, 'index']); // Afficher les détails d'une mission
// Route::post('missions/{mission_id}/details', [MissionDetailController::class, 'store']); // Créer un détail de mission pour une mission donnée
// Route::get('mission-details/{id}', [MissionDetailController::class, 'show']); // Afficher un détail de mission par son ID
// Route::put('mission-details/{id}', [MissionDetailController::class, 'update']); // Mettre à jour un détail de mission par son ID
// Route::delete('mission-details/{id}', [MissionDetailController::class, 'destroy']); // Supprimer un détail de mission par son ID

// Routes personnalisées pour les détails de mission
Route::get('mission-details', [MissionDetailController::class, 'index']); // Afficher les détails de mission
Route::post('mission-details', [MissionDetailController::class, 'store']); // Créer un détail de mission pour une mission donnée
Route::get('mission-details/{id}', [MissionDetailController::class, 'show']); // Afficher un détail de mission par son ID
Route::put('mission-details/{id}', [MissionDetailController::class, 'update']); // Mettre à jour un détail de mission par son ID
Route::delete('mission-details/{id}', [MissionDetailController::class, 'destroy']); // Supprimer un détail de mission par son ID



// Routes pour la gestion des missions personnelles
Route::get('/mes-missions', [MesMissionsController::class, 'index']);
Route::get('/mes-missions/{id}', [MesMissionsController::class, 'show']);
Route::post('/mes-missions', [MesMissionsController::class, 'store']);
Route::put('/mes-missions/{id}', [MesMissionsController::class, 'update']);
Route::delete('/mes-missions/{id}', [MesMissionsController::class, 'destroy']);


// Routes personnalisées pour les détails "Voir"
Route::get('voirs', [VoirController::class, 'index']); // Afficher les détails "Voir"
Route::post('voirs', [VoirController::class, 'store']); // Créer un détail "Voir"
Route::get('voirs/{id}', [VoirController::class, 'show']); // Afficher un détail "Voir" par son ID
Route::put('voirs/{id}', [VoirController::class, 'update']); // Mettre à jour un détail "Voir" par son ID
Route::delete('voirs/{id}', [VoirController::class, 'destroy']); // Supprimer un détail "Voir" par son ID


//Routes pour Mes Admissions
Route::get('/mes-admissions', [MesAdmissionsController::class, 'index']);
Route::get('/mes-admissions/{id}', [MesAdmissionsController::class, 'show']);
Route::post('/mes-admissions', [MesAdmissionsController::class, 'store']);
Route::put('/mes-admissions/{id}', [MesAdmissionsController::class, 'update']);
Route::delete('/mes-admissions/{id}', [MesAdmissionsController::class, 'destroy']);


// Routes pour Missions Manager
Route::get('/missions-manager', [MissionsManagerController::class, 'index']); // Afficher la liste des missions manager
Route::get('/missions-manager/{id}', [MissionsManagerController::class, 'show']); // Afficher les détails d'une mission manager par son ID
Route::post('/missions-manager', [MissionsManagerController::class, 'store']); // Créer une nouvelle mission manager
Route::put('/missions-manager/{id}', [MissionsManagerController::class, 'update']); // Mettre à jour une mission manager par son ID
Route::delete('/missions-manager/{id}', [MissionsManagerController::class, 'destroy']); // Supprimer une mission manager par son ID


// Routes pour Creer Missions
// Liste des missions créées
Route::get('/creer-missions', [CreerMissionController::class, 'index']);

// Afficher les détails d'une mission créée
Route::get('/creer-missions/{id}', [CreerMissionController::class, 'show']);

// Créer une nouvelle mission
Route::post('/creer-missions', [CreerMissionController::class, 'store']);

// Mettre à jour une mission créée
Route::put('/creer-missions/{id}', [CreerMissionController::class, 'update']);

// Supprimer une mission créée
Route::delete('/creer-missions/{id}', [CreerMissionController::class, 'destroy']);


// Routes pour Declarer Missions
// Liste des missions déclarées
Route::get('/declarer-missions', [DeclarerMissionController::class, 'index']);

// Afficher les détails d'une mission déclarée
Route::get('/declarer-missions/{id}', [DeclarerMissionController::class, 'show']);

// Déclarer une nouvelle mission
Route::post('/declarer-missions', [DeclarerMissionController::class, 'store']);

// Mettre à jour une mission déclarée
Route::put('/declarer-missions/{id}', [DeclarerMissionController::class, 'update']);

// Supprimer une mission déclarée
Route::delete('/declarer-missions/{id}', [DeclarerMissionController::class, 'destroy']);



// Routes pour Details Missions Manager
Route::prefix('details-missions')->group(function () {
    Route::get('/', [DetailsMissionManagerController::class, 'index']);
    Route::post('/', [DetailsMissionManagerController::class, 'store']);
    Route::get('/{id}', [DetailsMissionManagerController::class, 'show']);
    Route::put('/{id}', [DetailsMissionManagerController::class, 'update']);
    Route::delete('/{id}', [DetailsMissionManagerController::class, 'destroy']);
});



// Routes pour la gestion des gestionnaires de réseaux
Route::get('/reseaux-managers', [ReseauManagerController::class, 'index']);
Route::post('/reseaux-managers', [ReseauManagerController::class, 'store']);
Route::get('/reseaux-managers/{id}', [ReseauManagerController::class, 'show']);
Route::put('/reseaux-managers/{id}', [ReseauManagerController::class, 'update']);
Route::delete('/reseaux-managers/{id}', [ReseauManagerController::class, 'destroy']);


// Routes pour PlusInfoController
Route::get('/plus-infos', [PlusInfosController::class, 'index']); // Liste des informations "Plus d'infos"
Route::get('/plus-infos/{id}', [PlusInfosController::class, 'show']); // Afficher les détails d'une information "Plus d'infos" par son ID
Route::post('/plus-infos', [PlusInfosController::class, 'store']); // Créer une nouvelle information "Plus d'infos"
Route::put('/plus-infos/{id}', [PlusInfosController::class, 'update']); // Mettre à jour une information "Plus d'infos" par son ID
Route::delete('/plus-infos/{id}', [PlusInfosController::class, 'destroy']); // Supprimer une information "Plus d'infos" par son ID


// Routes pour ProfileDePlusInfoController
Route::get('/profiles-de-plus-infos', [ProfileDePlusInfoController::class, 'index']);
Route::get('/profiles-de-plus-infos/{id}', [ProfileDePlusInfoController::class, 'show']);
Route::post('/profiles-de-plus-infos', [ProfileDePlusInfoController::class, 'store']);
Route::put('/profiles-de-plus-infos/{id}', [ProfileDePlusInfoConstroller::class, 'update']);
Route::delete('/profiles-de-plus-infos/{id}', [ProfileDePlusInfoController::class, 'destroy']);
