<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller {
    public function add(Request $request) {
        // Vérifiez si l'utilisateur est authentifié
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        // Récupérer l'ID de l'utilisateur connecté
        $userId = $request->user()->id;

        // Validation de la requête pour s'assurer que card_id est présent et valide
        $request->validate(['card_id' => 'required|exists:cards,id']);
        
        // Ajout de la carte à la wishlist de l'utilisateur authentifié
        $request->user()->wishlist()->attach($request->card_id);
        
        // Retourner une réponse JSON
        return response()->json(['message' => 'Card added to wishlist'], 201);
    }   

    public function remove(Request $request) {
        // Vérification de l'utilisateur authentifié
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validation de la requête pour s'assurer que card_id est présent et valide
        $request->validate(['card_id' => 'required|exists:cards,id']);
        
        // Retirer la carte de la wishlist de l'utilisateur authentifié
        $request->user()->wishlist()->detach($request->card_id);
        
        // Retourner une réponse JSON
        return response()->json(['message' => 'Card removed from wishlist']);
    }

    public function list(Request $request) {
        // Vérification de l'utilisateur authentifié
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Retourner la wishlist de l'utilisateur authentifié en format JSON
        return response()->json($request->user()->wishlist);
    }
}