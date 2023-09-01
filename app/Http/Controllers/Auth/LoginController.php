<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //Login view
    public function Login()
    {
        if (Auth::check() == false) {
            return view('auth.user-signin');
        } else {
            return redirect('dashboard');
        }
    }

    public function UserLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
            return redirect()->intended(route('dashboard'))->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid.');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('index');
        }
    }
    
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
