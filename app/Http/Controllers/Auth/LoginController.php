<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;


use function PHPSTORM_META\type;

class LoginController extends Controller
{
   
    use AuthenticatesUsers;
   
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           $request->session()->regenerate();

            return redirect('dashboard');
        }
        return redirect('/')->withErrors([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}