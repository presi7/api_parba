<?php

// app/Http/Middleware/AdminMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {
    public function handle(Request $request, Closure $next) {
        // Vérifiez si l'utilisateur est connecté
        if (Auth::check()) {
            // Vérifiez le rôle de l'utilisateur
            if (Auth::user()->role === 'admin') {
                // L'utilisateur est un administrateur, continuez la requête
                return $next($request);
            }
        }

        // L'utilisateur n'est pas un administrateur, renvoyez une réponse non autorisée
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}


