<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    // Añadir un favorito
    public function store(Request $request){

        $request->validate([
            'user_id' => 'required',
            'film_id' => 'required',
        ]);

        $favoriteData = $request->all();
        $favorite = Favorite::create($favoriteData);

        return response()->json(['success' => true, 'data' => $favorite]);
    }
}
