<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Review;

class ReviewsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $series = Serie::where('series_slug',$id)->first();
        $reviews = Review::where('serie_id',$series->id)->orderBy('created_at','desc')->paginate(12);
        return view('links.reviews.show', compact('series','reviews'));
    }
}
