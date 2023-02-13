<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Shope;
use App\Models\Sparepart;


class SparepartShop extends Model
{
    use HasFactory;

    protected $table = 'sparepart_shop';

    protected $fillable = ['sparepart_id', 'shope_id', 'cost', 'price', 'lowest_price', 'quantity', 'location', 'notify_limit', 'starting_stock'];



    public function slug()
    {
        return $this->id;
    }

	public function shope()
	{
		return $this->belongsTo(Shope::class, 'shope_id', 'id')->withDefault(['id' => null]);
	}

	public function sparepart()
	{
		return $this->belongsTo(Sparepart::class, 'sparepart_id', 'id')->withDefault(['id' => null]);
	}

    public function scopeFilter($query)
    {
        return $query;
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderDesc', function (Builder $builder) {
            $builder->orderBy('sparepart_shop.id', 'DESC');
        });
    }
}
