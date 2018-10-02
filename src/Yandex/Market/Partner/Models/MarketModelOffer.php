<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class MarketModelOffer extends Model
{
    protected $id;
    protected $offers;
    protected $offlineOffers;
    protected $onlineOffers;

    protected $mappingClasses = [
        'offers' => Offers::class,
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Offers
     */
    public function getOffers()
    {
        return $this->offers;
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
