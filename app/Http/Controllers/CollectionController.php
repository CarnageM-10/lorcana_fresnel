<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller {
    public function add(Request $request) {
        // Vérifiez si l'utilisateur est authentifié
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        // Récupérer l'ID de l'utilisateur connecté
        $userId = $request->user()->id;

        // Validation de la requête
        $request->validate([
            'card_id' => 'required|exists:cards,id',
        ]);
        
        // Création de la collection
        Collection::create([
            'user_id' => $userId,
            'card_id' => $request->card_id,
        ]);
        
        // Retourner une réponse JSON
        return response()->json(['message' => 'Card added to collection'], 201);
    }   

    

    public function remove(Request $request) {
        // Vérification de l'utilisateur authentifié
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validation de la requête
        $request->validate(['card_id' => 'required|exists:cards,id']);
        
        // Retirer la carte de la collection de l'utilisateur authentifié
        Collection::where('user_id', $request->user()->id)
                  ->where('card_id', $request->card_id)
                  ->delete();
        
        // Retourner une réponse JSON
        return response()->json(['message' => 'Card removed from collection']);
    }

    public function list(Request $request) {
        // Vérification de l'utilisateur authentifié
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Retourner la collection de l'utilisateur authentifié en format JSON
        return response()->json($request->user()->collections);
    }
}
