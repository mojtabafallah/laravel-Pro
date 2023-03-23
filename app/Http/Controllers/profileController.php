<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profileController extends Controller
{
    //
    public function index()
    {
        return view('profile.index');
    }

    public function manageTwoFactor()
    {
        return view('profile.two-factor-auth');
    }
}
