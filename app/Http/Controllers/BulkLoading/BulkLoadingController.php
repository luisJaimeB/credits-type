<?php

namespace App\Http\Controllers\BulkLoading;

use App\Http\Controllers\Controller;
use App\Utils\CsvReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BulkLoadingController extends Controller
{
    public function index ()
    {   
        return view('bulkLoading.generate');
    }

    public function upload(Request $request) 
    {

        $request->file('cargue_masivo_master')->store(options:['disk' => 'imports']);

        $filePath = Storage::disk('imports')->path($request->file('cargue_masivo_master')->hashName());

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

        return view('bulkLoading.generate');
    }
}
