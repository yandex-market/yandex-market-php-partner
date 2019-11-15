<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class Stat extends Model
{
    const PLACE_GROUP_3 = 3;
    const PLACE_GROUP_4 = 4;
    const PLACE_GROUP_5 = 5;
    const PLACE_GROUP_6 = 6;
    const PLACE_GROUP_7 = 7;
    const PLACE_GROUP_9 = 9;
    const PLACE_GROUP_10 = 10;

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

    /**
     * @var DateType
     */
    private $dateType;

    protected $mappingClasses = [
        'detailedStats' => DetailedStats::class,
    ];

    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->dateType = new DateType();
    }

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
     * @return DetailedStats|null
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

    /**
     * @return \DateTimeImmutable|false
     */
    public function getDateTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_PUBLIC, $this->getDate());
    }
}
