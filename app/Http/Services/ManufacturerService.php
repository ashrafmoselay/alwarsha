<?php

namespace App\Http\Services;

use Exception;
use App\Models\Manufacturer;
use App\Traits\UploadFile;

class ManufacturerService
{
    use UploadFile;

    public function handle($request, $id = null)
    {
        try {
            $this->saveFiles($request);

            return Manufacturer::updateOrCreate(['id' => $id], $request);
        } catch (Exception $e) {
            return $e;
        }
    }

    protected function saveFiles(&$request)
    {
        foreach (request()->allFiles() as $key => $value) {
            if ($value && isset($request[$key])) {
                [$width, $height] = getimagesize($value);
                $request[$key] = $this->uploadImage($value, (new Manufacturer)->getTable(), $width, $height);
            }
        }
    }
}
