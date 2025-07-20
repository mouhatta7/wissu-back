<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Créer une nouvelle commande
    public function store(Request $request)
    {
        // Créer d'abord l'utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone
        ]);

        // Créer la commande
        $order = Order::create([
            'user_id' => $user->id,
            'dress_id' => $request->dress_id,
            'couleur_choisie' => $request->couleur_choisie,
            'taille_choisie' => $request->taille_choisie,
            'prix_total' => $request->prix_total
        ]);

        return response()->json([
            'message' => 'Commande créée avec succès',
            'order' => $order
        ], 201);
    }

    // Récupérer toutes les commandes (pour admin)
    public function index()
    {
        $orders = Order::with(['user', 'dress'])->get();
        return response()->json($orders);
    }
}