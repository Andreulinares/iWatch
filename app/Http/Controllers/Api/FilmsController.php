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
        return response()->json(['success' => true, 'data' => 'Tarea eliminada correctamente']);
    }

    /*
    public function show($id){
        $task = Task::find($id);
        return response()->json($task);
    }

    public function update($id, Request $request){
        $task = Task::find($id);

        $request->validate([
            'name' => 'required|max:5',
            'descripcion' => 'required'
        ]);

        $dataToUpdate = $request->all();
        $task->update($dataToUpdate);

        return response()->json(['success' => true, 'data' => $task]);
    }

    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
        return response()->json(['success' => true, 'data' => 'Tarea eliminada correctamente']);
    }
    */
}
