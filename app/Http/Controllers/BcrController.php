<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BcrController extends Controller
{
    public function index ()
    {
        return view('countries.bcr');
    }
}
