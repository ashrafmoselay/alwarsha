<?php

namespace App\Imports;

use App\Models\Manufacturer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ManufacturersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return Manufacturer::firstOrCreate([
            'name' => $row['name']
        ]);
    }

}
