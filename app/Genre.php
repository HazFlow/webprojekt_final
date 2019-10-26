<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	protected $fillable = [
		'genre_title',
		'genre_description'
	];

    public function series()
    {
    	return $this->hasMany(Serie::class, 'genre_id');
    }
}
