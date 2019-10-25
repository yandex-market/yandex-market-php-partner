<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Pager;
use Yandex\Market\Partner\Models\MarketModels;

class GetModelInfoResponse extends Model
{
    protected $models;
    protected $currency;
    protected $regionId;
    protected $pager;

    protected $mappingClasses = [
        'models' => MarketModels::class,
        'pager' => Pager::class,
    ];

    /**
     * @return MarketModels
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * @return Pager|null
     */
    public function getPager()
    {
        return $this->pager;
    }
}
