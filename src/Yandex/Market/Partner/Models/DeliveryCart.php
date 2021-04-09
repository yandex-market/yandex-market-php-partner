<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class DeliveryCart extends Model
{
    protected $region;
    protected $address;

    protected $mappingClasses = [
        'region' => Region::class,
        'address' => Address::class,
    ];

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
