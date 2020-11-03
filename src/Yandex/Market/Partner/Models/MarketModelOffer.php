<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class MarketModelOffer extends Model
{
    protected $id;
    protected $name;
    protected $prices;
    protected $offers;
    protected $offlineOffers;
    protected $onlineOffers;

    protected $mappingClasses = [
        'offers' => Offers::class,
        'prices' => ModelPrices::class,
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Offers
     */
    public function getOffers()
    {
        return $this->offers;
    }
    
    /**
     * @return ModelPrices
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @return int
     */
    public function getOfflineOffers()
    {
        return $this->offlineOffers;
    }

    /**
     * @return int
     */
    public function getOnlineOffers()
    {
        return $this->onlineOffers;
    }
}
