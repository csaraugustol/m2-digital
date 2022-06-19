<?php

namespace App\Models;

use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Group extends Model
{
    use SoftDeletes;
    use UuidAsPrimaryKey;
    use SoftCascadeTrait;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "groups";

    /**
     * Model attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Delete relationship with CampaignGroup and CityGroup when deleting a Group
     *
     * @var array
     */
    protected $softCascade = [
        'campaignsGroups',
        'citiesGroups',
    ];

    /**
     * Relationship of Group with City
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Relationship of Group with Campaign
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    /**
     * Relationship of Group with CityGroup
     */
    public function citiesGroups()
    {
        return $this->hasMany(CityGroup::class);
    }

    /**
     * Relationship of Group with CampaignGroup
     */
    public function campaignsGroups()
    {
        return $this->hasMany(CampaignGroup::class);
    }
}
