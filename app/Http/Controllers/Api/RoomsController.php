<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomsController extends Controller
{
    //
    public function index(){

        $rooms = Room::all()->toArray();
        return $rooms;
    }

    // Crear reseña
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'capacity' => 'required',
        ]);

        $roomData = $request->all();
        $rooms = Room::create($roomData);

        return response()->json(['success' => true, 'data' => $rooms]);
    }

    // Eliminar reseña
    public function destroy($id){
        $roomDelete = Room::find($id);
        $roomDelete->delete();
        return response()->json(['success' => true, 'data' => 'sala eliminada correctamente']);
    }

    // Actualizar reseña
    public function update($id, Request $request){
        $room = Room::find($id);

        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'capacity' => 'required',
        ]);

        $dataToUpdate = $request->all();
        $room->update($dataToUpdate);

        return response()->json(['success' => true, 'data' => $room]);
    }
}
