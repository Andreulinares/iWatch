<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Film extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    public $timestamps = false;

    protected $fillable = [
        "name",
        "synopsis",
        "director",
        "punctuation",
        "duration",
        "episodes",
        "seasons",
        "type"
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images/films')
            ->useFallbackUrl('/images/placeholder.jpg')
            ->useFallbackPath(public_path('/images/placeholder.jpg'));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        if (env('RESIZE_IMAGE') === true) {

            $this->addMediaConversion('resized-image')
                ->width(env('IMAGE_WIDTH', 300))
                ->height(env('IMAGE_HEIGHT', 300));
        }
    }
}
