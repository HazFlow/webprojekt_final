<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $fillable = [
    	'user_id',
    	'serie_id'
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
