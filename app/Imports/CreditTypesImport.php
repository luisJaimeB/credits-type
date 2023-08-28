<?php

namespace App\Imports;

use App\Models\CreditsTypeModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class CreditTypesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return CreditsTypeModel|null
     */
    public function model(array $row)
    {
        return new CreditsTypeModel([
           'terminal_alternativo' => $row[0],
           'merchant_alternativo'    => $row[1], 
           'tipos_credito' => $row[2],
           'bin' => $row[3],
           'rango_inicial' => $row[4],
           'rango_final' => $row[5],
           'franquicia' => $row[6],
           'bin_name' => $row[7],
        ]);
    }
}