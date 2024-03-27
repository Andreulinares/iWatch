<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Film;

class FavoritesController extends Controller
{
    // Añadir un favorito
    // public function store(Request $request){

    //     $request->validate([
    //         'user_id' => 'required',
    //         'film_id' => 'required',
    //     ]);

    //     $favoriteData = $request->all();
    //     $favorite = Favorite::create($favoriteData);

    //     return response()->json(['success' => true, 'data' => $favorite]);
    // }

    public function index()
    {
        // Obtener los favoritos del usuario actual
        $userId = auth()->user()->id;
        $favoriteFilms = Favorite::where('user_id', $userId)->get();

        return response()->json(['success' => true, 'data' => $favoriteFilms]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'film_id' => 'required',
        ]);

        $userId = $request->input('user_id');
        $filmId = $request->input('film_id');

        // Verificar si el usuario ya ha marcado esta película como favorita
        $existingFavorite = Favorite::where('user_id', $userId)
                                    ->where('film_id', $filmId)
                                    ->first();

        if ($existingFavorite) {
            return response()->json(['error' => 'Esta película ya está marcada como favorita'], 400);
        }

        // La película no está marcada como favorita, crear el favorito
        $favoriteData = [
            'user_id' => $userId,
            'film_id' => $filmId
        ];

        $favorite = Favorite::create($favoriteData);

        return response()->json(['success' => true, 'data' => $favorite]);
    }

    public function destroy($id)
    {
        $userId = auth()->user()->id;
        $favorite = Favorite::where('user_id', $userId)
                            ->where('film_id', $id)
                            ->first();

        if (!$favorite) {
            return response()->json(['error' => 'El favorito no existe'], 404);
        }

        $favorite->delete();

        return response()->json(['success' => true, 'message' => 'Favorito eliminado con éxito']);
    }
}
