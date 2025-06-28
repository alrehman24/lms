<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->role=='admin'){
                return redirect()->route('admin.dashboard');
            }else if(Auth::user()->role=='student'){
                return redirect()->route('student.dashboard');
            }else{
                Auth::logout();
                return redirect()->route('admin.login')->with('error','Unauthorized User');
            }
        } else {
            return redirect()->route('admin.login')->with('error','Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success','Logged Out Successfully');
    }
    public function register()
    {
        $user=new User();
        $user->name='John Doe';
        $user->email='admin@dom.com';
        $user->role='admin';

        $user->password=Hash::make('adminadmin');
        $user->save();
        return redirect()->route('admin.login');

    }
    public function form()
    {
        return view('admin.form');
    }
    public function table()
    {
        return view('admin.table');
    }
    public function changePassword()
    {
        return view('admin.change-password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'new_password_confirmation' => 'required|min:6|same:new_password',
        ]);
        $user = Auth::user();
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->update();
            Auth::logout();
            return redirect()->route('admin.login')->with('success', 'Password Changed Successfully');
        } else {
            //Auth::logout();
            return redirect()->route('admin.change-password')->with('error', 'Current Password is Incorrect');
        }
    }
}
