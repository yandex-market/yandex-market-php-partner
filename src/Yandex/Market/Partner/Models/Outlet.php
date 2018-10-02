<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Outlet extends Model
{
    protected $coords;
    protected $id;
    protected $isMain;
    protected $name;
    protected $reason;
    protected $shopOutletCode;
    protected $status;
    protected $type;
    protected $visibility;
    protected $isBookNow;
    protected $shopOutletId;
    protected $workingTime;

    /* Models */
    protected $address;
    protected $deliveryRules;
    protected $region;
    protected $workingSchedule;

    /* Arrays */
    protected $emails;
    protected $phones;

    protected $mappingClasses = [
        'address' => Address::class,
        'deliveryRules' => DeliveryRules::class,
        'region' => Region::class,
        'workingSchedule' => WorkingSchedule::class,
    ];

    /**
     * @return string
     */
    public function getCoords()
    {
        return $this->coords;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function getIsMain()
    {
        return $this->isMain;
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
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getShopOutletCode()
    {
        return $this->shopOutletCode;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @return bool
     */
    public function getIsBookNow()
    {
        return $this->isBookNow;
    }

    /**
     * @return string
     */
    public function getShopOutletId()
    {
        return $this->shopOutletId;
    }

    /**
     * @return string
     */
    public function getWorkingTime()
    {
        return $this->workingTime;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return DeliveryRules
     */
    public function getDeliveryRules()
    {
        return $this->deliveryRules;
    }

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return WorkingSchedule
     */
    public function getWorkingSchedule()
    {
        return $this->workingSchedule;
    }

    /**
     * @return array
     */
    public function getEmails()
    {
        return $this->emails;
    }

    public function getPhones()
    {
        return $this->phones;
    }
}
