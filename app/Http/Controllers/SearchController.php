<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use DB;

class SearchController extends Controller
{
    public function searchInput(Request $request)
    {
        $series = DB::table('series')->where('title', 'Like', $request->input . '%')->limit(16)->get();
        if ($series->count())
        	return view('links.search.search_input', compact('series'));
        else
            return "<p class='text-center'>No record found.</p>";
    }

    public function searchName(Request $request)
    {
        $series = DB::table('series')->orderByRaw('title ASC')->limit(16)->get();
        return view('links.search.name', compact('series'));
    }

    public function searchDate(Request $request)
    {
        $series = DB::table('series')->orderByRaw('created_at desc')->limit(16)->get();
        return view('links.search.date', compact('series'));
    }

    public function searchRating(Request $request)
    {
        $series = DB::table('series')->orderByRaw('total_stars desc')->limit(16)->get();
        return view('links.search.rating', compact('series'));
    }
}
