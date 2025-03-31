<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControl extends Controller
{
    public function index()
    {
        $compaigns = \App\Models\Compaign::latest()->take(3)->get();
        return view('website.welcome', compact('compaigns'));
    }

    public function about()
    {
        return view('website.about');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function terms()
    {
        return view('website.terms');
    }

    public function privacy()
    {
        return view('website.privacy');
    }
}
