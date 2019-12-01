<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	return view('user.dashboard', compact('user'));
    }

    public function profile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'my_password' => $request->password,
        ]);

        Session::flash('success','Profile updated.');
        return redirect()->back();
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/account-login');
    }
}
