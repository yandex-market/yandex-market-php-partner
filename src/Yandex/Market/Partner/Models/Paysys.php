<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Paysys extends Model
{
    protected $paysysId;
    protected $cc;
    protected $name;
    protected $paymentMethod;
    protected $legalEntity;
    protected $regionId;
    protected $resident;
    protected $paymentLimit;

    /**
     * @return int
     */
    public function getPaysysId()
    {
        return $this->paysysId;
    }

    /**
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
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
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
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
     * @return double
     */
    public function getPaymentLimit()
    {
        return $this->paymentLimit;
    }

    /**
     * @return bool
     */
    public function getResident()
    {
        return $this->resident;
    }
}
