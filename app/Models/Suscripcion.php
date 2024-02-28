<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "name",
        "price",
        "duration"
    ];
}
