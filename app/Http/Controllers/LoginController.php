<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;  
use Illuminate\Http\Request;

use App\Models\User;  

class LoginController extends Controller
{
     /**
     * Display a listing of the resource.
     * Redirec to view login
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create user
        // $user = new user;
   
        // $user->fill([
        //     'name'     => 'user',
        //     'email'    => 'bt@gmail.com',
        //     'password' => bcrypt('123'),
        // ]);

        // $user->save();
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin.home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
