<?php

namespace App\Actions;

use App\Contracts\ActionContract;


class CreditBcrFormattingAction implements ActionContract 
{
    public function __construct(protected array $data)
    {

    }

    public function excecute(): array
    {
        return [
            'include' => [
                [
                    'ranges' => $this->prepareRanges(),
                    'credits' => $this->prepareCredits(),
                ]
            ],
        ];
    } 

    private function prepareRanges(): array
    {
        return collect($this->data)
            ->transform(function(array $item){
                return [
                    'bin' => $item[3],
                    'end' => $item[5],
                    'start' => $item[4]
                ];
            })
            ->unique('bin')
            ->toArray();
    }

    private function prepareCredits(): array
    {
        $credits = [];

        foreach ($this->data as $row) {
            $creditType = $row[2];
            $merchanCode = $row[1];
            $installment = (int)explode(" ", $creditType)[2];
            $terminalNumber = $row[0];

            $code = match ($installment) {
                3 => "03BCR",
                6 => "06BCR",
                9 => "09BCR",
                12 => "12BCR",
                18 => "18BCR",
                24 => "24BCR"
            };
            
            $credits[] = [
                'code' => $code,
                'description' => strtoupper($creditType),
                'installment' => $installment,
                'merchantCode' => $merchanCode,
                'terminalNumber' => $terminalNumber
            ];
        }

        return collect($credits)
            ->unique('installment')
            ->values()
            ->toArray();
    }
}

