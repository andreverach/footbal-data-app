<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function view(){
        return view('view');
    }

    public function teams(){
        return view('team');
    }

    public function my_team(){
        return view('my-team');
    }
}
