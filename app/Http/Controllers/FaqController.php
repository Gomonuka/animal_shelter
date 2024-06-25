<?php

namespace App\Http\Controllers;

class FaqController extends Controller
{
    /**
     * Show the FAQ page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('FAQ');
    }
}
