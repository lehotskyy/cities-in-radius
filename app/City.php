<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App
 *
 * @mixin Builder
 *
 * @property int $id
 * @property string $name
 * @property float $ltd
 * @property float $lng
 */
class City extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'ltd',
        'lng'
    ];

    public static function getCitiesInRadius(self $city, int $radius)
    {
        return static::selectRaw("id, name, (6371 * ACOS(COS(RADIANS(ltd)) * COS(RADIANS({$city->ltd})) * COS(RADIANS({$city->lng}) - RADIANS(lng)) + SIN(RADIANS(ltd)) * SIN(RADIANS({$city->ltd})))) AS distance")
            ->where('id', '<>', $city->id)
            ->having('distance', '<=', $radius)
            ->orderBy('distance', 'asc')
            ->get();
    }

    public function getDistanceAttribute($value)
    {
        return number_format($value, 2);
    }
}
