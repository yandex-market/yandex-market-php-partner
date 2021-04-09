<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Item extends Model
{
    protected $id;
    protected $feedId;
    protected $offerId;
    protected $offerName;
    protected $feedCategoryId;
    protected $count;
    protected $price;
    protected $subsidy;
    protected $vat;
    protected $promos;
    protected $instances;

    protected $mappingClasses = [
        'promos' => Promos::class,
        'instances' => Instances::class,
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
     * @return Promos|null
     */
    public function getPromos()
    {
        return $this->promos;
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
    public function getOfferName()
    {
        return $this->offerName;
    }

    /**
     * @return double
     */
    public function getSubsidy()
    {
        return $this->subsidy;
    }

    /**
     * @return string
     */
    public function getFeedCategoryId()
    {
        return $this->feedCategoryId;
    }

    /**
     * @return Instances
     */
    public function getInstances()
    {
        return $this->instances;
    }
}
