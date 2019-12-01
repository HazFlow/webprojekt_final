<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class IndexController extends Controller
{
    public function index()
    {
    	$latest_series = Serie::orderBy('created_at','desc')->limit(8)->get();
    	$recommended = Serie::orderBy('total_stars','desc')->limit(6)->get(); 
    	return view('index', compact('latest_series','recommended'));
    }
}
