<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmsController extends Controller
{
    // Listar peliculas
    public function index(){
        $films = Film::with('media')->get();

        return $films;
    }

    public function getFilmByCat($id){
        $filmByCat = Film::with('media')->where('categoria_id', $id)->get();
        return $filmByCat;
    }
    
    // Crear pelicula
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'synopsis' => 'required',
            'director' => 'required',
            'duration' => 'required',
            'episodes' => 'required',
            'seasons' => 'required',
            'type' => 'required',
        ]);
        $filmData = $request->all();
        $filmData['punctuation'] = 0;
        $peli = Film::create($filmData);

        if ($request->hasFile('thumbnail')) { 
            $peli->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-films');
        }
        
        if ($request->hasFile('video')) {
            $peli->addMediaFromRequest('video')
                ->preservingOriginal()
                ->toMediaCollection('videos-films', 'video');
        }

        return response()->json(['success' => true, 'data' => $peli]);
    }

    // Eliminar pelicula
    public function destroy($id){
        $filmDelete = Film::find($id);
        $filmDelete->delete();
        return response()->json(['success' => true, 'data' => 'Serie eliminada correctamente']);
    }

    // Actualizar pelicula
    public function update($id, Request $request){
        $film = Film::find($id);

        $request->validate([
            'name' => 'required',
            'synopsis' => 'required',
            'director' => 'required',
            'punctuation' => 'required',
            'duration' => 'required',
            'video' => 'video',
            'poster' => 'poster'
        ]);

        $dataToUpdate = $request->all();
        $film->update($dataToUpdate);

        return response()->json(['success' => true, 'data' => $film]);
    }

    public function getFilmById($id) {
        $film = Film::with('media')->find($id);
    
        if (!$film) {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }
    
        return $film;
    }

    public static function getSeriesNameById($id)
    {
        $serie = Film::find($id);

        if (!$serie) {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }

        return response()->json(['name' => $serie->name]);
    }

    public function getAllSeriesNames()
    {
        $series = Film::where('type', 'serie')->orderBy('name')->pluck('name');
        return $series;
    }
    
    

    /*
    public function show($id){
        $task = Task::find($id);
        return response()->json($task);
    }
    */
}
