<?php

namespace App\Actions;

use App\Contracts\ActionContract;

class CreditDavFormattingAction implements ActionContract
{
    public function __construct(protected array $data)
    {

    }

    public function excecute()
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
            ->filter(function(array $item){
                return !empty($item[3]);
            })
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

        foreach ($this->data as $row) {
            
            $creditTypes = explode(",", $row[2]);
            $code = collect($creditTypes)
                ->filter(function(string $creditType) {
                    return strlen($creditType) === 5;
                })->transform(function(string $creditType) use ($row) {
                    return [
                        'code' => $creditType,
                        'description' => 'A paguitos',
                        'installment' => (int)(substr($creditType, 0, 1) === "0") ? substr($creditType, 1, 1) : substr($creditType, 0, 2),
                        'merchantCode' => $row[1],
                        'terminalNumber' => $row[0]
                    ];
                })->toArray();

            return $code;
        }

    }
} 