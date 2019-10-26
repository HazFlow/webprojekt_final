<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
    	'genre_id',
    	'title',
    	'description',
    	'duration',
    	'provider',
    	'thumbnail',
    	'total_raters',
    	'total_stars',
    	'series_slug'
    ];

    public function genre()
    {
    	return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
