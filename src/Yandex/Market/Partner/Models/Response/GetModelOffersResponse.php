<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\MarketModelOffers;
use Yandex\Market\Partner\Models\ModelPrices;

class GetModelOffersResponse extends Model
{
    protected $models;
    protected $currency;
    protected $regionId;
    protected $prices;

    protected $mappingClasses = [
        'models' => MarketModelOffers::class,
        'prices' => ModelPrices::class,
    ];

    /**
     * @return int
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return MarketModelOffers
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * @return ModelPrices|null;
     * @deprecated
     */
    public function getPrices()
    {
        return $this->prices;
    }
}
