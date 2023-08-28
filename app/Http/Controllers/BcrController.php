<?php

namespace App\Http\Controllers;

use App\Imports\CreditTypesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BcrController extends Controller
{
    public function index ()
    {
        return view('countries.bcr');
    }

    public function import() 
    {
        Excel::import(new CreditTypesImport, 'credits_type.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
}
