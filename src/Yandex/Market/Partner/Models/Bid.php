<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Bid extends Model
{
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

    protected $modelCard;
    protected $cardPricesCpo;

    protected $mappingClasses = [
        'modelCard' => ModelCard::class,
        'cardPricesCpo' => ModelCard::class,
    ];

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
     * @return ModelCard
     */
    public function getModelCard()
    {
        return $this->modelCard;
    }

    /**
     * @return ModelCard
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
}
