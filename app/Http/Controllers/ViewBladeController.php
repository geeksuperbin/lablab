<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewBladeController extends Controller
{
    public function t1(){
        return view("blades.t1");
    }

    public function t2(){
        return view("layouts.app");
    }


}
