<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\Serie;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = DB::table('series')->select('id','title','duration','total_raters','total_stars','created_at','series_slug')->paginate(15);
        return view('admin.series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = DB::table('genres')->select('id','genre_title')->get();
        return view('admin.series.create', compact('genres'));
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
            'genre_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'provider' => 'required',
            'thumbnail' => 'required',
        ]);

        // Uploading thumbnail
        $file = $request->thumbnail;
        $name = $file->getClientOriginalName();
        $name = time().str_replace(' ','',$name);
        $file->move('public/uploads/thumbnail/',$name);

        Serie::create([
            'genre_id' => $request->genre_id,
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'provider' => $request->provider,
            'thumbnail' => $name,
            'series_slug' => str_slug($request->title)
        ]);

        Session::flash('success','Series created successfully.');
        return redirect('/admin/series');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $series = Serie::where('series_slug', $id)->first();
        return view('admin.series.show', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genres = DB::table('genres')->select('id','genre_title')->get();
        $series = Serie::where('series_slug', $id)->first();
        return view('admin.series.edit', compact('series','genres'));
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
            'genre_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'provider' => 'required'
        ]);

        $series = Serie::find($id);
        $name = $series->thumbnail;
        // Uploading thumbnail
        if ($request->has('thumbnail')) {
            unlink('public/uploads/thumbnail/'.$name);
            $file = $request->thumbnail;
            $name = time().str_replace(' ','',$file->getCleintOriginalName());
            $file->move('public/uploads/thumbnail/',$name);
        }

        $series->update([
            'genre_id' => $request->genre_id,
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'provider' => $request->provider,
            'thumbnail' => $name,
            'series_slug' => str_slug($request->title)
        ]);

        Session::flash('success','Series updated successfully.');
        return redirect('/admin/series');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $series = DB::table('series')->where('id', $id);
        $obj = $series->first();
        $name = $obj->thumbnail;
        unlink('public/uploads/thumbnail/'.$name);
        $series->delete();

        Session::flash('success','Series deleted successfully.');
        return redirect('/admin/series');
    }
}
