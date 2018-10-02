<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class DeliveryRule extends Model
{
    protected $cost;
    protected $deliveryServiceId;
    protected $maxDeliveryDays;
    protected $minDeliveryDays;
    protected $orderBefore;
    protected $priceFreePickup;
    protected $unspecifiedDeliveryInterval;
    protected $dateSwitchHour;
    protected $priceFrom;
    protected $priceTo;
    protected $shipperHumanReadableId;
    protected $shipperId;
    protected $shipperName;
    protected $workInHoliday;

    /**
     * @return double
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return int
     */
    public function getDeliveryServiceId()
    {
        return $this->deliveryServiceId;
    }

    /**
     * @return int
     */
    public function getMaxDeliveryDays()
    {
        return $this->maxDeliveryDays;
    }

    /**
     * @return int
     */
    public function getMinDeliveryDays()
    {
        return $this->minDeliveryDays;
    }

    /**
     * @return int
     */
    public function getOrderBefore()
    {
        return $this->orderBefore;
    }

    /**
     * @return double
     */
    public function getPriceFreePickup()
    {
        return $this->priceFreePickup;
    }

    /**
     * @return bool
     */
    public function getUnspecifiedDeliveryInterval()
    {
        return $this->unspecifiedDeliveryInterval;
    }

    /**
     * @return int
     */
    public function getDateSwitchHour()
    {
        return $this->dateSwitchHour;
    }

    /**
     * @return double
     */
    public function getPriceFrom()
    {
        return $this->priceFrom;
    }

    /**
     * @return double
     */
    public function getPriceTo()
    {
        return $this->priceTo;
    }

    /**
     * @return string
     */
    public function getShipperHumanReadableId()
    {
        return $this->shipperHumanReadableId;
    }

    /**
     * @return int
     */
    public function getShipperId()
    {
        return $this->shipperId;
    }

    /**
     * @return string
     */
    public function getShipperName()
    {
        return $this->shipperName;
    }

    /**
     * @return bool
     */
    public function getWorkInHoliday()
    {
        return $this->workInHoliday;
    }
}
