<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    	'serie_id',
    	'user_id',
    	'stars',
    	'review'
    ];

    public function series()
    {
    	return $this->belongsTo(Serie::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
