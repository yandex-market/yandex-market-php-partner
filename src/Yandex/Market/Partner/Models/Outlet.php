<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Outlet extends Model
{
    const STATUS_AT_MODERATION = 'AT_MODERATION';
    const STATUS_AT_FAILED = 'FAILED';
    const STATUS_AT_MODERATED = 'MODERATED';
    const STATUS_AT_NONMODERATED = 'NONMODERATED';

    const TYPE_DEPOT = 'DEPOT';
    const TYPE_MIXED = 'MIXED';
    const TYPE_NOT_DEFINED = 'NOT_DEFINED';
    const TYPE_RETAIL = 'RETAIL';

    const VISIBILITY_HIDDEN = 'HIDDEN';
    const VISIBILITY_UNKNOWN = 'UNKNOWN';
    const VISIBILITY_VISIBLE = 'VISIBLE';

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
     * @deprecated
     */
    public function getIsBookNow()
    {
        return $this->isBookNow;
    }

    /**
     * @return string
     * @deprecated
     */
    public function getShopOutletId()
    {
        return $this->shopOutletId;
    }

    /**
     * @return string
     * @deprecated
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
     * @return string[]
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @return string[]
     */
    public function getPhones()
    {
        return $this->phones;
    }
}
