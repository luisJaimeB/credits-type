<?php

namespace App\Http\Controllers;

use App\Actions\CreditDavFormattingAction;
use App\Utils\CsvReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaviviendaController extends Controller
{
    public function index ()
    {
        return view('countries.davivienda');
    }

    public function upload(Request $request) 
    {
 
        $request->file('tipo_credito_dav')->store(options:['disk' => 'imports']);

        $filePath = Storage::disk('imports')->path($request->file('tipo_credito_dav')->hashName());

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

        $data = (new CreditDavFormattingAction($data))->excecute();

        return view('countries.davivienda', compact('data'));
    }
}
