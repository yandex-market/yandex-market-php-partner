<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Person extends Model
{
    protected $personId;
    protected $name;
    protected $legalEntity;
    protected $regionId;
    protected $resident;

    /**
     * @return int
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function getLegalEntity()
    {
        return $this->legalEntity;
    }

    /**
     * @return int
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * @return bool
     */
    public function getResident()
    {
        return $this->resident;
    }
}
