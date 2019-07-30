<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class ShipmentItem extends ObjectModel
{
    protected $shopSku;
    protected $marketSku;
    protected $itemName;
    protected $barcodes;
    protected $count;
    protected $factCount;
    protected $defectCount;
    protected $estimatedPrice;
    protected $currency;
    protected $vat;
    protected $boxCount;
    protected $comment;
    protected $errors;

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
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return string
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * @return mixed
     */
    public function getBarcodes()
    {
        return $this->barcodes;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getFactCount()
    {
        return $this->factCount;
    }

    /**
     * @return int
     */
    public function getDefectCount()
    {
        return $this->defectCount;
    }

    /**
     * @return double
     */
    public function getEstimatedPrice()
    {
        return $this->estimatedPrice;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @return int
     */
    public function getBoxCount()
    {
        return $this->boxCount;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
