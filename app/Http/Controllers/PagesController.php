<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function about() {
        return view('pages.about');
    }

    public function prestations() {
        return view('pages.prestations');
    }
    
    public function contact() {
        return view('pages.contact');
    }
    
    public function login() {
        if (auth()->user()) {
            return redirect('/client');
        }

        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }
}
