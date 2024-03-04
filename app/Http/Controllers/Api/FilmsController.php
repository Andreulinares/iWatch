<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmsController extends Controller
{
    // Listar peliculas
    public function index(){
        $films = Film::all()->toArray();
        return $films;
    }

    
    // Crear pelicula
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'synopsis' => 'required',
            'director' => 'required',
            'duration' => 'required',
            'video' => 'video',
            'poster' => 'poster'
        ]);

        $filmData = $request->all();
        $filmData['punctuation'] = 0;
        $peli = Film::create($filmData);

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

    /*
    public function show($id){
        $task = Task::find($id);
        return response()->json($task);
    }
    */
}
