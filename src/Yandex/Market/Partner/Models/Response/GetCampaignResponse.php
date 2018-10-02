<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Campaign;

class GetCampaignResponse extends Model
{
    protected $campaign;

    protected $mappingClasses = [
        'campaign' => Campaign::class,
    ];

    /**
     * @return Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }
}
