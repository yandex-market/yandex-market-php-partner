<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class DeliveryInfo extends Model
{
    const TYPE_DELIVERY = "DELIVERY";
    const TYPE_PICKUP = "PICKUP";
    const TYPE_POST = "POST";

    const DELIVERY_PARTNER_TYPE_SHOP = "SHOP";

    const NO_VAT = "NO_VAT";
    const VAT_0 = "VAT_0";
    const VAT_10 = "VAT_10";
    const VAT_10_110 = "VAT_10_110";
    const VAT_20 = "VAT_20";
    const VAT_20_120 = "VAT_20_120";

    protected $deliveryPartnerType;
    protected $deliveryServiceId;
    protected $id;
    protected $outletCode;
    protected $price;
    protected $serviceName;
    protected $type;
    protected $vat;
    protected $address;
    protected $dates;
    protected $region;
    protected $outlet;

    protected $mappingClasses = [
        'address' => Address::class,
        'dates' => Dates::class,
        'region' => Region::class,
        'outlet' => DeliveryOutlet::class
    ];

    /**
     * @return string
     */
    public function getDeliveryPartnerType()
    {
        return $this->deliveryPartnerType;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getDeliveryServiceId()
    {
        return $this->deliveryServiceId;
    }

    /**
     * @return string
     */
    public function getOutletCode()
    {
        return $this->outletCode;
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
     * @return Address|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return Dates|null
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * @return DeliveryOutlet
     */
    public function getOutlet()
    {
        return $this->outlet;
    }
}
