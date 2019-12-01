<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Serie;
use Auth;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Review::create([
            'serie_id' => $request->series_id,
            'user_id' => Auth::id(),
            'stars' => $request->stars,
            'review' => $request->review
        ]);

        $series = Serie::find($request->series_id);
        $raters = $series->total_raters + 1;
        $stars = $series->total_stars + $request->stars;
        $series->update([
            'total_raters' => $raters,
            'total_stars' => $stars
        ]);

        return redirect()->back();
    }
}
