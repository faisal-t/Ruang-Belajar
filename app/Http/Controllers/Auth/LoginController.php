<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Hamcrest\Core\HasToString;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $result = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        

        if (auth()->attempt($result))
        {
           
                return redirect('/home');
        

            // else if(auth()->user()->role == "guru" && auth()->user()->aktivasi == "none_aktifasi"){
            //     return back()->withStatus('Akun Anda Belum Diaktivasi Oleh Admin Harap Tunggu Diaktivasi');
            // }

            
        }
        else{
            return back()->withStatus('Username atau password salah');
        }

        
    }
}
