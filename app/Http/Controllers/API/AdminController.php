<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Connexion admin
    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            return response()->json([
                'success' => true,
                'message' => 'Connexion réussie',
                'admin' => $admin
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email ou mot de passe incorrect'
        ], 401);
    }

    // Créer un admin
    public function store(Request $request)
    {
        $admin = Admin::create([
            'email' => $request->email,
            'password' => $request->password // Le mot de passe sera hashé automatiquement
        ]);

        return response()->json([
            'message' => 'Admin créé avec succès',
            'admin' => $admin
        ], 201);
    }

    // Dashboard admin - récupérer les statistiques
    public function dashboard()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'en_attente')->count();
        $recentOrders = Order::with(['user', 'dress'])
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

        return response()->json([
            'total_orders' => $totalOrders,
            'pending_orders' => $pendingOrders,
            'recent_orders' => $recentOrders
        ]);
    }

    // Mettre à jour le statut d'une commande
    public function updateOrderStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update([
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Statut mis à jour',
            'order' => $order->load(['user', 'dress'])
        ]);
    }
}