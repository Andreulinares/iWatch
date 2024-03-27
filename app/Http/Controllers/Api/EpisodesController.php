<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;

class EpisodesController extends Controller
{
    // Listar episodios
    public function index(){
        $episode = Episode::with('media')->get();

        return $episode;
    }

    // Crear episodio
    public function store(Request $request){

        $request->validate([
            'episode_name' => 'required',
            'duration' => 'required',
            'order' => 'required',
            'season_id' => 'required',
        ]);
        $episodeData = $request->all();
        $episode = Episode::create($episodeData);

        if ($request->hasFile('thumbnail')) { 
            $episode->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-films');
        }
        
        if ($request->hasFile('video')) {
            $episode->addMediaFromRequest('video')
                ->preservingOriginal()
                ->toMediaCollection('videos-films', 'video');
        }

        return response()->json(['success' => true, 'data' => $episode]);
    }

    // Eliminar episodio
    public function destroy($id){
        $episodeDelete = Episode::find($id);
        $episodeDelete->delete();
        return response()->json(['success' => true, 'data' => 'Episodio eliminado correctamente']);
    }
}
