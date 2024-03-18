<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'suscripcion_id',
        'start_date',
        'end_date',
    ];

    // Falta añadir lo del WITHPIVOT para poder añadir los campos de fechas (al pivot solo se le pasa los campos que no sean ID)
}
