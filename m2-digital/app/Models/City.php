<?php

namespace App\Models;

use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class City extends Model
{
    use SoftDeletes;
    use UuidAsPrimaryKey;
    use SoftCascadeTrait;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "cities";

    /**
     * Model attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'state',
    ];

    /**
     * Delete CityGroup relationship when deleting a City
     *
     * @var array
     */
    protected $softCascade = [
        'citiesGroups',
    ];

    /**
     * Relationship of City with Group
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * Relationship of City with CityGroup
     */
    public function citiesGroups()
    {
        return $this->hasMany(CityGroup::class);
    }
}
