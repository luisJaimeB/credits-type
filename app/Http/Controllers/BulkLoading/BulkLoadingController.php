<?php

namespace App\Http\Controllers\BulkLoading;

use App\Http\Controllers\Controller;
use App\Utils\CsvReaderMassFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class BulkLoadingController extends Controller
{
    public function index ()
    {   
        return view('bulkLoading.generate');
    }

    public function generate(Request $request)
    {

        $request->file('cargue_masivo_master')->store(options:['disk' => 'imports']);

        $filePath = Storage::disk('imports')->path($request->file('cargue_masivo_master')->hashName());

        $reader = new CsvReaderMassFile($filePath);

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

        $validatedIssuer = [];
        $dataValidated = [];
        $validatedRangeI;
        $validatedRangeF;
        $validatedCountry;

        foreach ($data as $key => $row) {
            if (isset($row[1])) {
                $validatedIssuer[] = $row[0];
                $validatedRangeI = $row[2];
                $validatedRangeF = $row[3];
                $validatedCountry = $row[7];
                if (strpos($row[1], ' ') === 0) {
                    array_pop($validatedIssuer);
                    $validatedIssuer[] = $row[0] . $row[1];
                    $validatedRangeI = $row[3];
                    $validatedRangeF = $row[4];
                    $validatedCountry = $row[8];
                }
            }
            $issuer = $validatedIssuer[$key];
            $initialRange = $validatedRangeI;
            $finalRange = $validatedRangeF;
            $brand = "MasterCard";
            $country = $validatedCountry;
            
            $dataFinal = [
                'Issuer' => $issuer,
                'Initial Range' => $initialRange,
                'Final Range' => $finalRange,
                'Brand' => $brand,
                'Country' => $country
            ];

            $dataValidated[] = $dataFinal;
        }

        $this->download($dataValidated);
        
        return view('bulkLoading.generate', compact('dataValidated'));
    }

    public function download (array $data) {

        $dataValidated = $data;

        $csvPath = Storage::disk('local')->path('cargue_masivo_mastercard.csv');

        // Abrimos el archivo CSV para escritura
        $file = fopen($csvPath, 'w');

        // Escribimos las cabeceras del archivo
        fputcsv($file, ['Issuer', 'Initial Range', 'Final Range', 'Brand', 'Country']);

        // Escribimos los datos en el archivo
        foreach ($dataValidated as $row) {
            fputcsv($file, $row);
        }

        // Cerramos el archivo
        fclose($file);

        // Convertimos el recurso de archivo en una cadena
        $fileString = file_get_contents($csvPath);

        // Configuramos la respuesta HTTP
        return response()->download($fileString, 'cargue_masivo_mastercard.csv', [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="cargue_masivo_mastercard.csv"',
        ]);
    }
}
