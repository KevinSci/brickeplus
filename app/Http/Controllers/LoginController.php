<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('iniciar-sesion');
    }

    public function store(Request $request){
         if(!Auth::attempt($request->only('email', 'password')) ){
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }
        $request->session()->regenerate();
        return redirect()->route('home');
    }
    
}
