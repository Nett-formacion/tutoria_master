<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $num = rand(1,10);
        return view ("layout", ['num'=>$num]);
    }
    //
}
