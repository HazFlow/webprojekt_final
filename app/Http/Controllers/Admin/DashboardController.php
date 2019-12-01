<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$admin = Auth::user();
        $series = DB::table('series')->count();
        $users = DB::table('users')->count();
        $reviews = DB::table('reviews')->count();
    	return view('admin.dashboard', compact('admin','series','users','reviews'));
    }

    public function profileUpdate(Request $request)
    {
    	$admin = User::find($request->admin_id);
    	$admin->update([
    		'name' => $request->name,
    		'username' => $request->username,
    		'password' => bcrypt($request->password),
    		'my_password' => $request->password
    	]);

    	Session::flash('success','Profile updated successfully');
    	return redirect()->back(); 
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/account-login');
    }
}
