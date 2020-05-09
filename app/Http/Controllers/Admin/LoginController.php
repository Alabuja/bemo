<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
    }

    public function showLoginForm() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->only('username','password');

        if(Auth::guard('admins')->attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }

        return view('admin.login')->withErrors('Incorrect Username or Password!');
    }

    public function logout() {
        Auth::guard('admins')->logout();
        return redirect('/admin/login');
    }
}
