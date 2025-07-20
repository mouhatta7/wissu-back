<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dress;
use Illuminate\Http\Request;

class DressController extends Controller
{
    // Récupérer toutes les robes
    public function index()
    {
        $dresses = Dress::all();
        return response()->json($dresses);
    }

    // Filtrer par catégorie
    public function getByCategory($type)
    {
        $dresses = Dress::where('type', $type)->get();
        return response()->json($dresses);
    }

    // Récupérer une robe spécifique
    public function show($id)
    {
        $dress = Dress::findOrFail($id);
        return response()->json($dress);
    }

    // Ajouter une nouvelle robe (pour admin)
    public function store(Request $request)
    {
        $dress = Dress::create([
            'type' => $request->type,
            'nom' => $request->nom,
            'prix' => $request->prix,
            'description' => $request->description,
            'image' => $request->image,
            'variantes' => $request->variantes
        ]);

        return response()->json($dress, 201);
    }
}