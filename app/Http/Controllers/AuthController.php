<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function proses_login(Request $request) {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $credentials=$request->only('email','password');

        if(Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'You have successfull login');
        }
        return redirect('login')->withErrors(['login_error'=>'Username or Password wrong']);
    }

    public function dashboard() {
        if(Auth::check()) {
            return view('home');
        }
        return redirect('login')->withErrors(['login_error'=>'Username or Password wrong']);
    }
    
    public function register() {
        return view('auth.register');
    }

    public function proses_register(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ]);

        $request['roles'] = 'admin';

        User::create($request->all());

        return redirect('dashboard')->with('success','Success login');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect()->intended('login');
    }
    
}
