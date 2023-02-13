<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Modele;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class Sparepart extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'spareparts';

    protected $fillable = ['title', 'description', 'code', 'model_id', 'tax', 'image'];


    protected $appends = ['total_qty'];

	protected function image(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value && Storage::disk('public')->exists( 'uploads/spareparts/' . $value ) ? 'storage/uploads/spareparts/' . $value : null,
		);
	}

    public function slug()
    {
        return $this->id;
    }

	public function model()
	{
		return $this->belongsTo(Modele::class, 'model_id', 'id')->withDefault(['id' => null]);
	}

    public function scopeFilter($query)
    {
        return $query;
    }

    public function storeStock()
    {
        return $this->belongsToMany(Shope::class, 'sparepart_shop', 'sparepart_id', 'shope_id')
                    ->withPivot('cost','price','lowest_price','quantity','location','notify_limit','starting_stock')
                    ->withTimestamps();
    }


    protected function getTotalQtyAttribute()
    {
        $sum = $this->storeStock->sum('pivot.quantity');
        // $this->storeStock->each(function ($row) use ($sum) {
        //     $sum += $row->pivot->quantity;
        // });
        return $sum;
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderDesc', function (Builder $builder) {
            $builder->orderBy('id', 'DESC');
        });
    }
}
