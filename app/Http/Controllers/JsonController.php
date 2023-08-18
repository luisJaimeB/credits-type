<?php

namespace App\Http\Controllers;

use App\Imports\CreditTypesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function import() 
    {
        //Excel::import(new CreditTypesImport, 'users.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
}
