<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\IncomeExpensesGroup;
use App\Models\Shope;
use Carbon\Carbon;

class IncomeExpense extends Model
{
    use HasFactory;

    protected $table = 'income_expenses';

    protected $fillable = ['type','transaction_date', 'shope_id', 'group_id', 'title', 'comments', 'amount', 'vat_value'];


    protected function transactionDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

	public function group()
	{
		return $this->belongsTo(IncomeExpensesGroup::class, 'group_id', 'id')->withDefault(['id' => null]);
	}

	public function shope()
	{
		return $this->belongsTo(Shope::class, 'shope_id', 'id')->withDefault(['id' => null]);
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
