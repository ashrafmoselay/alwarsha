<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;


class Shope extends Model
{
    use HasFactory;

    protected $table = 'shopes';

    protected $fillable = ['name', 'contact_person', 'contact_no', 'email', 'license_no', 'vat_number', 'address', 'logo', 'seal', 'active'];
    
    
    
	protected function logo(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value && Storage::disk('public')->exists( 'uploads/shopes/' . $value ) ? 'storage/uploads/shopes/' . $value : null,
		);
	}

	protected function seal(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $value && Storage::disk('public')->exists( 'uploads/shopes/' . $value ) ? 'storage/uploads/shopes/' . $value : null,
		);
	}

    public function slug()
    {
        return $this->id;
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
