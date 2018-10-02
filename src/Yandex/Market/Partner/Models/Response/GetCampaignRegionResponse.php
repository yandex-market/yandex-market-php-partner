<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Region;

class GetCampaignRegionResponse extends Model
{
    protected $region;

    protected $mappingClasses = [
        'region' => Region::class
    ];

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }
}
