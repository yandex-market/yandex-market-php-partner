<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Offer extends Model
{
    protected $bid;
    protected $cbid;
    protected $currency;
    protected $discount;
    protected $feedId;
    protected $id;
    protected $marketCategoryId;
    protected $modelId;
    protected $preDiscountPrice;
    protected $price;
    protected $shopCategoryId;
    protected $name;
    protected $url;
    protected $pos;
    protected $regionId;
    protected $shippingCost;
    protected $shopName;
    protected $shopRating;
    protected $cutPrice;
    protected $blocked;

    /**
     * @return double
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @return int
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * @return double
     */
    public function getCbid()
    {
        return $this->cbid;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getMarketCategoryId()
    {
        return $this->marketCategoryId;
    }

    /**
     * @return int
     */
    public function getModelId()
    {
        return $this->modelId;
    }

    /**
     * @return float
     */
    public function getPreDiscountPrice()
    {
        return $this->preDiscountPrice;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getShopCategoryId()
    {
        return $this->shopCategoryId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return int|null
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * @return int|null
     */
    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    /**
     * @return null|string
     */
    public function getShopName()
    {
        return $this->shopName;
    }

    /**
     * @return int|null
     */
    public function getShopRating()
    {
        return $this->shopRating;
    }

    /**
     * @return bool
     */
    public function getCutPrice()
    {
        return $this->cutPrice;
    }

    /**
     * @return bool
     */
    public function getBlocked()
    {
        return $this->blocked;
    }
}
