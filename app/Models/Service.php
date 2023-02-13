<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Department;


class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = ['title', 'description', 'durationPeriodValue', 'durationPeriodType', 'warrantyPeriodValue', 'warrantyPeriodType', 'active', 'allowPriceChangeInTicket', 'department_id','service_price','min_price'];



    public function slug()
    {
        return $this->id;
    }

	public function department()
	{
		return $this->belongsTo(Department::class, 'department_id', 'id')->withDefault(['id' => null]);
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
