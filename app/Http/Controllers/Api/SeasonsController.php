<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Season;

class SeasonsController extends Controller
{
    public function index(){
        $seasons = Season::all()->toArray();
        return $seasons;
    }

    // Crear season
    public function store(Request $request){

        $request->validate([
            'season_name' => 'required',
            'order' => 'required',
            'content_id' => 'required',
        ]);
        $seasonData = $request->all();
        $season = Season::create($seasonData);

        return response()->json(['success' => true, 'data' => $season]);
    }
}
