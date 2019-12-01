<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = DB::table('genres')->select('id','genre_title')->paginate(15);
        return view('admin.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'genre_title'
        ]);

        Genre::create([
            'genre_title' => $request->genre_title,
            'genre_description' => $request->genre_description
        ]);

        Session::flash('success','Genre created successfully.');
        return redirect('/admin/genre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('admin.genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        return view('admin.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'genre_title',
            'genre_description'
        ]);

        $genre = Genre::find($id);
        $genre->update([
            'genre_title' => $request->genre_title,
            'genre_description' => $request->genre_description
        ]);

        Session::flash('success','Genre updated successfully.');
        return redirect('/admin/genre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('genres')->where('id', $id)->delete();
        // Session::flash('success','Genre deleted successfully.');
        // return redirect('/admin/genre');
    }
}
