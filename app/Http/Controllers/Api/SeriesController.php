<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    // Listar series
    public function index(){
        $series = Serie::all()->toArray();
        return $series;
    }
}
