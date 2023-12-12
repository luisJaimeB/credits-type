<?php

namespace App\Http\Controllers;

use App\Actions\CreditBcrFormattingAction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Utils\CsvReader;


class BcrController extends Controller
{      
    public function index ()
    {   
        return view('countries.bcr');
    }

    public function upload(Request $request) 
    {

        $request->file('tipo_credito_bcr')->store(options:['disk' => 'imports']);

        $filePath = Storage::disk('imports')->path($request->file('tipo_credito_bcr')->hashName());

        $reader = new CsvReader($filePath);

        $line = 0;
        $headers = [];
        $data = [];
        
        foreach ($reader->rows() as $row) {
            $line++;
            
            if ($line == 1) {
                $headers = $row;
            } else {
                $data[] = $row;
            }
        }

        $data = (new CreditBcrFormattingAction($data))->excecute();

        return view('countries.bcr', compact('data'));
    }
}
