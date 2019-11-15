<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Address extends Model
{
    protected $regionId;
    protected $street;
    protected $number;
    protected $building;
    protected $estate;
    protected $block;
    protected $additional;
    protected $km;
    protected $city;

    /**
     * @return int
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @return string
     */
    public function getEstate()
    {
        return $this->estate;
    }

    /**
     * @return string
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @return string
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * @return int
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @return string
     * @deprecated
     */
    public function getCity()
    {
        return $this->city;
    }
}
