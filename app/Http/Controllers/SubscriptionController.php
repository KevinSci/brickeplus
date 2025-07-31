<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    
    public function index(){
        $user = Auth::user();// traer la sesion de usuario

        return view('subscription');
    }
    

    public function store(Request $request){

        
        Payment::create([
            'card_number' => $request->card_number,
            'card_name' => $request->card_name,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv,
        ]);

        $user = Auth::user();
        $user->plan_id = $request->plan;
        $user->save();
        



        return redirect()->route('home');

    }
}
