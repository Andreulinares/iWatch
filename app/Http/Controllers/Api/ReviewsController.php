<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    //
    public function index(){

        $reviews = Review::all()->toArray();
        return $reviews;
    }

    // Crear reseña
    public function store(Request $request){

        $request->validate([
            'description' => 'required',
            'punctuation' => 'required',
            'creation_date' => 'required',
        ]);

        $reviewData = $request->all();
        $review = Review::create($reviewData);

        return response()->json(['success' => true, 'data' => $review]);
    }

    // Eliminar reseña
    public function destroy($id){
        $reviewDelete = Review::find($id);
        $reviewDelete->delete();
        return response()->json(['success' => true, 'data' => 'reseña eliminada correctamente']);
    }

    // Actualizar reseña
    public function update($id, Request $request){
        $review = Review::find($id);

        $request->validate([
            'description' => 'required',
            'punctuation' => 'required',
            'creation_date' => 'required',
        ]);

        $dataToUpdate = $request->all();
        $review->update($dataToUpdate);

        return response()->json(['success' => true, 'data' => $review]);
    }
}
