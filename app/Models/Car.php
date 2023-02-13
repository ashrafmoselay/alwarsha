<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\City;
use App\Models\Client;
use App\Models\Modele;


class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = ['client_id', 'city_id', 'model_id', 'plateNo', 'contactNo', 'year', 'color', 'odoMeterKm', 'vin', 'details'];
    
    
    
    public function slug()
    {
        return $this->id;
    }
    
	public function city() 
	{
		return $this->belongsTo(City::class, 'city_id', 'id')->withDefault(['id' => null]);
	}

	public function client() 
	{
		return $this->belongsTo(Client::class, 'client_id', 'id')->withDefault(['id' => null]);
	}

	public function model() 
	{
		return $this->belongsTo(Modele::class, 'model_id', 'id')->withDefault(['id' => null]);
	}

    public function scopeFilter($query)
    {
        return $query;
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderDesc', function (Builder $builder) {
            $builder->orderBy('id', 'DESC');
        });
    }
}
