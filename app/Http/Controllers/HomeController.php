<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        
        if(Auth::check()){
            if(Auth::user()->role->nombre == 'admin'){
                return Redirect()->route('usuarios admin');
            }elseif(Auth::user()->role->nombre == 'user'){
                return Redirect()->route('user home');
            }       
        }
    }
}
