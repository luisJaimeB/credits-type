<?php

namespace App\Http\Controllers;

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

        $seenValues = [];
        $seenCredits = [];
        $credits = [];

        foreach ($data as $key => $row) {
            $valueToCheck = $row[3]; // Almacenamos el valor en la posición 3

            // Verificar si el valor ya se ha visto antes
            if (in_array($valueToCheck, $seenValues)) {
                unset($data[$key]); // Eliminar el array duplicado
            } else {
                $seenValues[] = $valueToCheck; // Agregar el valor a la lista de valores vistos
            }

            $creditType = $row[2];
            $merchanCode = $row[1];
            $installment = substr($creditType, 0, 2);
            $terminalNumber = $row[0];
            $creditsA = [
                $creditType,
                'A Paguitos',
                $installment,
                $merchanCode,
                $terminalNumber

            ];
            
            $credits[] = $creditsA;
        }

        foreach ($credits as $key => $item) {
            $type = $item[0];
            if (in_array($type, $seenCredits)) {
                unset($credits[$key]);
            } else{
                $seenCredits[] = $type;
            }
        }

        $credits = array_values($credits);

        return view('countries.davivienda', compact('data', 'credits'));
    }
}
