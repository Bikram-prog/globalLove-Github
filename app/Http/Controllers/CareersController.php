<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function index(){
        return view('careers');
    }

    public function blog(){
        return view('blog');
    }

    public function post(){
        return view('article');
    }
}
