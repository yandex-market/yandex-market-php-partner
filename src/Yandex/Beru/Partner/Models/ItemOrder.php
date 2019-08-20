<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class ItemOrder extends Model
{
    protected $id;
    protected $offerId;
    protected $count;
    protected $price;
    protected $vat;
    protected $promos;
    protected $feeUE;
    protected $shopSku;
    protected $feedId;
    protected $offerName;

    protected $mappingClasses = [
        'promos' => Promos::class,
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
    public function getOfferId()
    {
        return $this->offerId;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @return Promos
     */
    public function getPromos()
    {
        return $this->promos;
    }

    /**
     * @return double
     */
    public function getFeeUE()
    {
        return $this->feeUE;
    }

    /**
     * @return string
     */
    public function getShopSku()
    {
        return $this->shopSku;
    }

    /**
     * @return int+
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * @return string
     */
    public function getOfferName()
    {
        return $this->offerName;
    }
}
