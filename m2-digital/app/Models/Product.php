<?php

namespace App\Models;

use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Product extends Model
{
    use SoftDeletes;
    use UuidAsPrimaryKey;
    use SoftCascadeTrait;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "products";

    /**
     * Model attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'value',
    ];

    /**
     * Delete CampaignProduct relationship when deleting a Product
     *
     * @var array
     */
    protected $softCascade = [
        'campaignsProducts',
    ];

    /**
     * Relationship of Product with Campaign
     */
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaigns_products', 'product_id', 'campaign_id');
    }

    /**
     * Relationship of Product with CampaignProduct
     */
    public function campaignsProducts()
    {
        return $this->hasMany(CampaignProduct::class);
    }
}
