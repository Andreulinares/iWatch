<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suscripcion;

class SuscripcionController extends Controller
{
    //
    public function index(){

        $suscripciones = Suscripcion::all()->toArray();
        return $suscripciones;
    }

    // Crear suscripcion
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);

        $suscripcionData = $request->all();
        $suscripcion = Suscripcion::create($suscripcionData);

        return response()->json(['success' => true, 'data' => $suscripcion]);
    }

    // Eliminar suscripcion
    public function destroy($id){
        $suscripcionDelete = Suscripcion::find($id);
        $suscripcionDelete->delete();
        return response()->json(['success' => true, 'data' => 'Suscripcion eliminada correctamente']);
    }

    // Actualizar suscripcion
    public function update($id, Request $request){
        $suscripcion = Suscripcion::find($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);

        $dataToUpdate = $request->all();
        $suscripcion->update($dataToUpdate);

        return response()->json(['success' => true, 'data' => $suscripcion]);
    }
}
