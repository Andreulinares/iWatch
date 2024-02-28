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
}
