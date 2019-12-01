<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class BrowseController extends Controller
{
    public function index()
    {
    	$serieses = Serie::paginate(12);
    	return view('links.browse.index', compact('serieses'));
    }
}
