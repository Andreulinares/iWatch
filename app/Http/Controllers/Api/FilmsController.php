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

    /*
    public function getFilmByCat($id){
        $filmByCat = Film::where('categoria_id', $id)->get();
        return $filmByCat;
    }
    */
    
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

    public function show($id){
        $selectedFilms = Film::find($id);
        return response()->json($selectedFilms);
    }

    /*
    public function show($id){
        $task = Task::find($id);
        return response()->json($task);
    }
    */
}
