<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Buyer extends Model
{
    protected $id;
    protected $lastName;
    protected $firstName;
    protected $middleName;
    protected $phone;

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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
