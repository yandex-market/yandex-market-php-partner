<?php

namespace Yandex\Market\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class OrderInfo extends Model
{
    const PAYMENT_TYPE_POSTPAID = "POSTPAID";
    const PAYMENT_TYPE_PREPAID = "PREPAID";

    const PAYMENT_METHOD_CARD_ON_DELIVERY = "CARD_ON_DELIVERY";
    const PAYMENT_METHOD_CASH_ON_DELIVERY = "CASH_ON_DELIVERY";
    const PAYMENT_METHOD_YANDEX = "YANDEX";
    const PAYMENT_APPLE_PAY = "APPLE_PAY";
    const PAYMENT_GOOGLE_PAY = "GOOGLE_PAY";

    const STATUS_RESERVED = "RESERVED";
    const STATUS_UNPAID = "UNPAID";
    const STATUS_PROCESSING = "PROCESSING";
    const STATUS_DELIVERY = "DELIVERY";
    const STATUS_CANCELLED = "CANCELLED";
    const STATUS_DELIVERED = "DELIVERED";
    const STATUS_PICKUP = "PICKUP";

    const SUBSTATUS_RESERVATION_EXPIRED = "RESERVATION_EXPIRED";
    const SUBSTATUS_USER_NOT_PAID = "USER_NOT_PAID";
    const SUBSTATUS_PROCESSING_EXPIRED = "PROCESSING_EXPIRED";
    const SUBSTATUS_USER_CHANGED_MIND = "USER_CHANGED_MIND";
    const SUBSTATUS_REPLACING_ORDER = "REPLACING_ORDER";
    const SUBSTATUS_SHOP_FAILED = "SHOP_FAILED";

    const TAX_SYSTEM_ECHN = "ECHN";
    const TAX_SYSTEM_ENVD = "ENVD";
    const TAX_SYSTEM_OSN = "OSN";
    const TAX_SYSTEM_PSN = "PSN";
    const TAX_SYSTEM_USN = "USN";
    const TAX_SYSTEM_USN_MINUS_COST = "USN_MINUS_COST";

    const CURRENCY_RUR = "RUR";

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
    protected $subsidyTotal;
    protected $buyer;
    protected $delivery;
    protected $items;
    protected $notes;

    protected $mappingClasses = [
        'buyer' => Buyer::class,
        'delivery' => DeliveryInfo::class,
        'items' => Items::class,
    ];

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
     * @return DeliveryInfo
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

    /**
     * @return int
     */
    public function getSubsidyTotal()
    {
        return $this->subsidyTotal;
    }

    /**
     * @return DateTime|false
     */
    public function getCreationDateType()
    {
        return DateTime::createFromFormat("d-m-Y H:i:s", $this->getCreationDate());
    }

    /**
     * @return Buyer
     */
    public function getBuyer()
    {
        return $this->buyer;
    }
}
