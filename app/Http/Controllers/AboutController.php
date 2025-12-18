<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Static content for now (can be dynamic later)
        $impact = [
            'years'     => 10,
            'lives'     => 5000,
            'programs'  => 120,
            'partners'  => 30,
        ];

        return view('about', compact('impact'));
    }
}
