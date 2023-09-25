<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Supports\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::user()->roll_as==0){
            return view('frontend.index');
        }
        else{
            return view("login");
        }
    }
}
