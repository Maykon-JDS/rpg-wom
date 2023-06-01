<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErroController extends Controller
{
    public function fallback(){
        return view('errors.404');
    }
}
