<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Manufacturer;
use Spatie\Translatable\HasTranslations;


class Modele extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'modeles';

    protected $fillable = ['manufacturer_id', 'name', 'active'];

    protected $translatable = ['name'];

    protected $with = ['manufacturer'];

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


	public function manufacturer()
	{
		return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id')->withDefault(['id' => null]);
	}

    public function scopeFilter($query)
    {
        return $query->when(request()->manufacturer, function($query) {
            $query->where('manufacturer_id', request()->manufacturer);
        });
    }


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'DESC');
        });
    }
}
