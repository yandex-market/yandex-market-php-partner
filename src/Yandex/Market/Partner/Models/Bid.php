<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class Bid extends Model
{
    const STATUS_ERROR_INVALID_BID_VALUE = 'ERROR_INVALID_BID_VALUE';
    const STATUS_ERROR_OFFER_NOT_FOUND = 'ERROR_OFFER_NOT_FOUND';
    const STATUS_UNKNOWN = 'UNKNOWN';
    const STATUS_INDEXING = 'INDEXING';
    const STATUS_PUBLISHED = 'PUBLISHED';

    protected $bid;
    protected $cbid;
    protected $dontPullUpBids;
    protected $error;
    protected $feedId;
    protected $modified;
    protected $offerId;
    protected $offerName;
    protected $status;
    protected $minBid;
    protected $minCbid;
    protected $name;
    protected $search;

    protected $modelCard;
    protected $cardPricesCpo;

    /**
     * @var DateType
     */
    private $dateType;

    protected $mappingClasses = [
        'modelCard' => ModelCard::class,
        'cardPricesCpo' => ModelCard::class,
        'search' => Search::class,
    ];

    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->dateType = new DateType();
    }

    /**
     * @return double
     */
    public function getMinBid()
    {
        return $this->minBid;
    }

    /**
     * @return double
     */
    public function getMinCbid()
    {
        return $this->minCbid;
    }

    /**
     * @return ModelCard|null
     */
    public function getModelCard()
    {
        return $this->modelCard;
    }

    /**
     * @return ModelCard|null
     */
    public function getCardPricesCpo()
    {
        return $this->cardPricesCpo;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return double
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @return double
     */
    public function getCbid()
    {
        return $this->cbid;
    }

    /**
     * @return boolean
     */
    public function getDontPullUpBids()
    {
        return $this->dontPullUpBids;
    }

    /**
     * @return int
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * @return string
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @return string
     */
    public function getOfferId()
    {
        return $this->offerId;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getModifiedTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getModified());
    }

    /**
     * @return Search|null
     */
    public function getSearch()
    {
        return $this->search;
    }
}
