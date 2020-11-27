<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == "guru"){
            return redirect('/materi');
            
        }

        else if(auth()->user()->role == "admin"){
            return redirect('/kelolauser');
        }
        
        else if(auth()->user()->role == "siswa"){
            return redirect('siswa');
        }

        else{
            return back()->with('status','Gagal Login Akun Anda Mungkin Belum Diaktifasi Silahkan Tunggu Akun Anda Diaktivasi');
        }
        
    }
}
