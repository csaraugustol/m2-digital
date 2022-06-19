<?php

namespace App\Models;

use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignProduct extends Model
{
    use SoftDeletes;
    use UuidAsPrimaryKey;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "campaigns_products";

    /**
     * Model attributes
     *
     * @var array
     */
    protected $fillable = [
        'campaign_id',
        'product_id',
        'discount_value',
        'final_product_value',
    ];

    /**
     * Relationship of CampaignProduct with Campaign
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Relationship of CampaignProduct with Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
