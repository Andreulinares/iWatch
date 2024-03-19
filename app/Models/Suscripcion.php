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

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subscriptions')->withPivot('start_date', 'end_date');
    }
}
