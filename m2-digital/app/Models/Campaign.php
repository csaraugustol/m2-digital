<?php

namespace App\Models;

use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Campaign extends Model
{
    use SoftDeletes;
    use UuidAsPrimaryKey;
    use SoftCascadeTrait;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "campaigns";

    /**
     * Model attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Delete relationship with CampaignProduct and CampaignGroup when deleting a Campaign
     *
     * @var array
     */
    protected $softCascade = [
        'campaignsProducts',
        'campaignsGroups',
    ];

    /**
     * Relationship of Campaign with Group
     */
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /**
     * Relationship of Campaign with Product
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'campaigns_products', 'campaign_id', 'product_id');
    }

    /**
     * Relationship of Campaign with CampaignProduct
     */
    public function campaignsProducts()
    {
        return $this->hasMany(CampaignProduct::class);
    }

    /**
     * Relationship of Campaign with CampaignGroup
     */
    public function campaignsGroups()
    {
        return $this->hasMany(CampaignGroup::class);
    }
}
