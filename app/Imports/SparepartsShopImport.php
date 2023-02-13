<?php

namespace App\Imports;

use App\Models\Manufacturer;
use App\Models\Modele;
use App\Models\Shope;
use App\Models\Sparepart;
use App\Models\SparepartShop;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SparepartsShopImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $shop = Shope::firstOrCreate(['name'=>$row['shopname']]);
        $sparepart = Sparepart::firstOrCreate(
            [
                'code' => $row['code'],
                'title'=> $row['sparepartname']
            ],
            [
                'title'=> $row['sparepartname'],
                'code' => $row['code'],
                'tax' => $row['tax'],
                'description' => $row['description'],
                'model_id'     => $this->getModelID($row['model'],$row['manufacturer']),
            ]
            );
        return SparepartShop::updateOrCreate([
            'shope_id' => $shop->id,
            'sparepart_id'=> $sparepart->id
        ], [
            'shope_id' => $shop->id,
            'sparepart_id'=> $sparepart->id,
            'cost'=> $row['cost'],
            'price'=> $row['price'],
            'lowest_price'=> $row['lowest_price'],
            'quantity'=> $row['quantity'],
            'location'=> $row['location'],
            'notify_limit'=> $row['notify_limit'],
            'starting_stock'=> $row['starting_stock'],
        ]);
    }

    protected function getModelID($name,$manufacturer)
    {
        $row = Modele::where('name', 'LIKE', "%$name%")->first();
        if(!$row){
            $manufacturer = Manufacturer::where('name', 'LIKE', "%$manufacturer%")->first();
            if(!$manufacturer){
                $manufacturer = Manufacturer::firstOrCreate(['name'=>$manufacturer]);
            }
            $row =  Modele::firstOrCreate([
                'name' => $name,
                'manufacturer_id'=>$manufacturer->id
            ]);
        }
        return $row->id ?? null;
    }
}
