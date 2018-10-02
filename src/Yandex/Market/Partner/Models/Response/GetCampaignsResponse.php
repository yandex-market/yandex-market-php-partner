<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Campaigns;
use Yandex\Market\Partner\Models\Common\Pager;

class GetCampaignsResponse extends Model
{
    protected $campaigns;
    protected $pager;

    protected $mappingClasses = [
        'campaigns' => Campaigns::class,
        'pager' => Pager::class,
    ];

    /**
     * @return Campaigns
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    /**
     * @return Pager
     */
    public function getPager()
    {
        return $this->pager;
    }
}
