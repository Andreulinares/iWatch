<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    ///
    public function index(){

        $categorias = Categoria::all()->toArray();
        return $categorias;
    }

    // Crear reseña
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $categoriaData = $request->all();
        $categorias = Categoria::create($categoriaData);

        return response()->json(['success' => true, 'data' => $categorias]);
    }

    // Eliminar reseña
    public function destroy($id){
        $categoriaDelete = Categoria::find($id);
        $categoriaDelete->delete();
        return response()->json(['success' => true, 'data' => 'categoria eliminada correctamente']);
    }

    // Actualizar reseña
    public function update($id, Request $request){
        $categoria = Categoria::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $dataToUpdate = $request->all();
        $categoria->update($dataToUpdate);

        return response()->json(['success' => true, 'data' => $categoria]);
    }
}
