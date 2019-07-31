<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Order extends Model
{
    protected $cancelRequested;
    protected $creationDate;
    protected $currency;
    protected $fake;
    protected $id;
    protected $itemsTotal;
    protected $paymentType;
    protected $paymentMethod;
    protected $status;
    protected $substatus;
    protected $taxSystem;
    protected $total;
    protected $delivery;
    protected $items;
    protected $notes;

    protected $mappingClasses = [
        'delivery' => Delivery::class,
        'items' => ItemsOrder::class,
    ];

    /**
     * @return bool
     */
    public function getCancelRequested()
    {
        return $this->cancelRequested;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return bool
     */
    public function getFake()
    {
        return $this->fake;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return double
     */
    public function getItemsTotal()
    {
        return $this->itemsTotal;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSubstatus()
    {
        return $this->substatus;
    }

    /**
     * @return string
     */
    public function getTaxSystem()
    {
        return $this->taxSystem;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return Delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @return Items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
