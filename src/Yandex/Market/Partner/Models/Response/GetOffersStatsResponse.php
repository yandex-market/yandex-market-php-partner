<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\OfferStats;

class GetOffersStatsResponse extends Model
{
    protected $fromOffer;
    protected $toOffer;
    protected $totalOffersCount;
    protected $offerStats;

    protected $mappingClasses = [
        'offerStats' => OfferStats::class,
    ];

    /**
     * GetOffersStatsResponse constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data['offersStats']);
    }

    /**
     * @return int
     */
    public function getFromOffer()
    {
        return $this->fromOffer;
    }

    /**
     * @return int
     */
    public function getToOffer()
    {
        return $this->toOffer;
    }

    /**
     * @return int
     */
    public function getTotalOffersCount()
    {
        return $this->totalOffersCount;
    }

    /**
     * @return OfferStats
     */
    public function getOfferStats()
    {
        return $this->offerStats;
    }
}
