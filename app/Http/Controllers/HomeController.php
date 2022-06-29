<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function shop(){
        return view('front.shop');
    }
    public function index()
    {
        return view('front.home');
    }
    public function contact(){
        return view('front.contact');
    }
    
}
