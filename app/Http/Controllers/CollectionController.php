<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){
        return view('collection');
    }


    public function movie($movie){

        $movie = basename($movie);
        $path = ( $movie. '.mp4'); 

        $title = preg_replace('/(?<!^)([A-Z])/', ' $1', $movie);
        $title = ucwords(strtolower($title));
        
        return view('movie', compact('path', 'title'));
    }

    
}

