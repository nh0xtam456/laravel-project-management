<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin ()
    {
        if (!Auth::check()) {
            return view('login.index');
        }
        
        return redirect()->route('website.index');
    }

    public function postLogin (LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1
        ];
 
        if (Auth::attempt($login)) {
            $request->session()->regenerate();
 
            return redirect()->route('admin.customers.index');
        }

        return back()->with([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout (Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('getLogin');
    }
}
