<?php

namespace App\Imports;

use App\Models\Manufacturer;
use App\Models\Modele;
use App\Models\Sparepart;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SparepartsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return Sparepart::firstOrCreate([
            'code' => $row['code'],
            'title'=> $row['title']
        ], [
            'title'=> $row['title'],
            'code' => $row['code'],
            'tax' => $row['tax'],
            'description' => $row['description'],
            'model_id'     => $this->getModelID($row['model'],$row['manufacturer']),
        ]);
    }

    protected function getModelID($name,$manufacturer)
    {
        $row = Modele::where('name', 'LIKE', "%$name%")->first();
        if(!$row){
            $manufacturer =  Manufacturer::firstOrCreate([
                'name' => $manufacturer
            ]);
            $row =  Modele::firstOrCreate([
                'name' => $name,
                'manufacturer_id'=>$manufacturer->id
            ]);
        }
        return $row->id ?? null;
    }
}
