<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        # validacion...?
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'plan_id' => null,
        ]);

        // pasar la auth a subscriptions 
        Auth::login($user);

        return redirect()->route('subscription');

    }
}
