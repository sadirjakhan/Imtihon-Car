<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main(){
        return view('main');
    }

    public function about(){
        return view('about');
    }

    public function service(){
        return view('service');
    }

    public function price (){
        return view('price');
    }

    public function project(){
        return view('project');
    }

    public function index(){
        return view('posts.index');
    }

    public function contact(){
        return view('contact');
    }



}
