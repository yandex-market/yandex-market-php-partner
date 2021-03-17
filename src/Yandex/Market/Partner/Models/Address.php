<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Address extends Model
{
    protected $postcode;
    protected $country;
    protected $city;
    protected $subway;
    protected $regionId;
    protected $street;
    protected $house;
    protected $block;
    protected $entrance;
    protected $entryphone;
    protected $floor;
    protected $apartment;
    protected $phone;
    protected $number;
    protected $building;
    protected $estate;
    protected $additional;
    protected $km;
    protected $recipient;

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
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getSubway()
    {
        return $this->subway;
    }

    /**
     * @return string
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * @return string
     */
    public function getEntrance()
    {
        return $this->entrance;
    }

    /**
     * @return string
     */
    public function getEntryphone()
    {
        return $this->entryphone;
    }

    /**
     * @return string
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @return string
     */
    public function getApartment()
    {
        return $this->apartment;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }
}
