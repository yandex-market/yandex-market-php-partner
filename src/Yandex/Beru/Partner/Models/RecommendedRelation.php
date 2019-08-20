<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class RecommendedRelation extends Model
{
    protected $shopSku;
    protected $name;
    protected $category;
    protected $vendor;
    protected $vendorCode;
    protected $barcodes;
    protected $price;
    protected $marketSku;
    protected $marketSkuName;
    protected $marketModelId;
    protected $marketModelName;
    protected $marketCategoryId;
    protected $marketCategoryName;

    /**
     * @return string
     */
    public function getShopSku()
    {
        return $this->shopSku;
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
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @return string
     */
    public function getVendorCode()
    {
        return $this->vendorCode;
    }

    /**
     * @return array
     */
    public function getBarcodes()
    {
        return $this->barcodes;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return string
     */
    public function getMarketSkuName()
    {
        return $this->marketSkuName;
    }

    /**
     * @return int
     */
    public function getMarketModelId()
    {
        return $this->marketModelId;
    }

    /**
     * @return string
     */
    public function getMarketModelName()
    {
        return $this->marketModelName;
    }

    /**
     * @return int
     */
    public function getMarketCategoryId()
    {
        return $this->marketCategoryId;
    }

    /**
     * @return string
     */
    public function getMarketCategoryName()
    {
        return $this->marketCategoryName;
    }
}
