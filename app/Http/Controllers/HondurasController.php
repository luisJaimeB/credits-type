<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HondurasController extends Controller
{
    public function index ()
    {
        return view('countries.honduras');
    }
}
