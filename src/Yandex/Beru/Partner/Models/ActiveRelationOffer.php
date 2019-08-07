<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class ActiveRelationOffer extends ObjectModel
{
    protected $shopSku;
    protected $name;
    protected $category;
    protected $manufacturer;
    protected $manufacturerCountries;
    protected $urls;
    protected $vendor;
    protected $vendorCode;
    protected $barcodes;
    protected $shelfLifeDays;
    protected $lifeTimeDays;
    protected $guaranteePeriodDays;
    protected $transportUnitSize;
    protected $minShipment;
    protected $quantumOfSupply;
    protected $supplyScheduleDays;
    protected $deliveryDurationDays;
    protected $processingState;

    protected $mappingClasses = [
        'processingState' => ProcessingState::class,
    ];

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
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @return array
     */
    public function getManufacturerCountries()
    {
        return $this->manufacturerCountries;
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->urls;
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
     * @return int
     */
    public function getShelfLifeDays()
    {
        return $this->shelfLifeDays;
    }

    /**
     * @return int
     */
    public function getLifeTimeDays()
    {
        return $this->lifeTimeDays;
    }

    /**
     * @return int
     */
    public function getGuaranteePeriodDays()
    {
        return $this->guaranteePeriodDays;
    }

    /**
     * @return int
     */
    public function getTransportUnitSize()
    {
        return $this->transportUnitSize;
    }

    /**
     * @return mixed
     */
    public function getMinShipment()
    {
        return $this->minShipment;
    }

    /**
     * @return int
     */
    public function getQuantumOfSupply()
    {
        return $this->quantumOfSupply;
    }

    /**
     * @return array
     */
    public function getSupplyScheduleDays()
    {
        return $this->supplyScheduleDays;
    }

    /**
     * @return int
     */
    public function getDeliveryDurationDays()
    {
        return $this->processingState;
    }

    /**
     * @return ProcessingState
     */
    public function getProcessingState()
    {
        return $this->processingState;
    }
}
