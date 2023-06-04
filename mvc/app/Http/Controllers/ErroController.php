<?php

namespace App\Http\Controllers;

class ErroController extends Controller
{
    public function fallback(){
        return view('errors.404');
    }
}
