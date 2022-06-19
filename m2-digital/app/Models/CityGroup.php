<?php

namespace App\Models;

use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityGroup extends Model
{
    use SoftDeletes;
    use UuidAsPrimaryKey;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "cities_groups";

    /**
     * Model attributes
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'group_id',
    ];

    /**
     * Relationship of CityGroup with City
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Relationship of CityGroup with Group
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
