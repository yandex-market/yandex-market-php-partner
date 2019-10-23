<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Stat extends Model
{
    protected $clicks;
    protected $date;
    protected $placeGroup;
    protected $shows;
    protected $spending;
    protected $detailedStats;
    protected $offerName;
    protected $url;
    protected $feedId;
    protected $offerId;

    protected $mappingClasses = [
        'detailedStats' => DetailedStats::class,
    ];

    /**
     * @return int
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getPlaceGroup()
    {
        return $this->placeGroup;
    }

    /**
     * @return int
     */
    public function getShows()
    {
        return $this->shows;
    }

    /**
     * @return double
     */
    public function getSpending()
    {
        return $this->spending;
    }

    /**
     * @return DetailedStats
     */
    public function getDetailedStats()
    {
        return $this->detailedStats;
    }

    /**
     * @return string
     */
    public function getOfferName()
    {
        return $this->offerName;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
    * @return int
    */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * @return int
     */
    public function getOfferId()
    {
        return $this->offerId;
    }
}
