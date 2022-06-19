<?php

namespace App\Models;

use App\Models\Traits\UuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignGroup extends Model
{
    use SoftDeletes;
    use UuidAsPrimaryKey;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = "campaigns_groups";

    /**
     * Model attributes
     *
     * @var array
     */
    protected $fillable = [
        'campaign_id',
        'group_id',
    ];

    /**
     * Relationship of CampaignGroup with Campaign
     */
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    /**
     * Relationship of CampaignGroup with Group
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
