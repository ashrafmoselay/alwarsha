<?php

namespace App\Imports;

use App\Models\Manufacturer;
use App\Models\Modele;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ModelsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return Modele::firstOrCreate([
            'name' => $row['name']
        ], [
            'name'              => $row['name'],
            'manufacturer_id'     => $this->getManufacturerID($row['manufacturer']),
        ]);
    }

    protected function getManufacturerID($name)
    {
        $row = Manufacturer::where('name', 'LIKE', "%$name%")->first();
        if(!$row){
            $row =  Manufacturer::firstOrCreate([
                'name' => $name
            ]);
        }
        return $row->id ?? null;
    }
}
