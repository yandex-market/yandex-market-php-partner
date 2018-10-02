<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\MarketModels;

class GetModelInfoResponse extends Model
{
    protected $models;
    protected $currency;
    protected $regionId;

    protected $mappingClasses = [
        'models' => MarketModels::class,
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
}
