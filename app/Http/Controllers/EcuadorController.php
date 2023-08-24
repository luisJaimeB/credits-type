<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EcuadorController extends Controller
{
    public function index(): View
    {
        return view('countries.ecuador');
    }
}
