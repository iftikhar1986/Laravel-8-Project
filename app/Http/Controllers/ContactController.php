<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function index(){
       // echo "This is our Contect Page";
       return view('contact');
    }

}