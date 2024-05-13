<?php
// app/Http/Controllers/ManagerController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AdminToken;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    public function createAccount(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            // 'admin_token' => 'required|string',
            // 'first_name' => 'required|string',
            // 'last_name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            \Log::error('Validation failed: ' . $validator->errors());
            return response()->json(['error' => 'Validation failed', 'details' => $validator->errors()], 422);
        }

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');

        // Utilisez firstOrCreate au lieu de firstOrNew
        \Log::info('Before firstOrCreate');

        $user = User::firstOrCreate(
            ['name' => $firstName . ' ' . $lastName],
            [
                'role' => 'manager',
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]
        );

        \Log::info('After firstOrCreate');

        return response()->json(['message' => 'Account created successfully', 'data' => $user], 201);
    } catch (\Exception $e) {
        \Log::error('Error creating Manager account: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred while creating the account'], 500);
    }
}

public function login(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed', 'details' => $validator->errors()], 422);
        }

        // $user = User::where('email', $request->input('email'))->first();
        $email = strtolower($request->input('email')); // Convertir l'adresse e-mail entrée par l'utilisateur en minuscules
        $user = User::where('email', $email)->first();


        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Récupérez le rôle de l'utilisateur
        $role = $user->role;

        // Authentification réussie, renvoyer le rôle de l'utilisateur
        return response()->json(['message' => 'Login successful', 'user' => $user, 'role' => $role], 200);
    } catch (\Exception $e) {
        \Log::error('Error logging in: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred while logging in'], 500);
    }
}

}
