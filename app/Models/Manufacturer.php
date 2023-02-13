<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Translatable\HasTranslations;


class Manufacturer extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'manufacturers';

    protected $fillable = ['name', 'active'];

    protected $translatable = ['name'];

	public function asJson($value)
	{
		return json_encode($value, JSON_UNESCAPED_UNICODE);
	}

	protected function name(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $this->getName(),
		);
	}

	public function getName($lang = null)
	{
		$lang = $lang ?? app()->getLocale();
		return $this->getTranslations('name')[$lang] ?? '';
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
