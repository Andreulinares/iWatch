<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Season;

class SeasonsController extends Controller
{
    public function index(){
        $seasons = Season::all()->toArray();
        return $seasons;
    }
}
