<?php

namespace App\Utils;


class CsvReaderMassFile
{
    protected $file;

    public function __construct(string $filePath)
    {
        $this->file = fopen($filePath, 'r');
    }

    public function rows()
    {
        while (!feof($this->file)) {
            $row = fgetcsv($this->file, 4096, ',');

            if (is_array($row)) {
                yield $row;
            }
        }
    }
}