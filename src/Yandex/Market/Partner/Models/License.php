<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class License extends Model
{
    protected $id;
    protected $outletId;
    protected $licenseType;
    protected $number;
    protected $dateOfIssue;
    protected $dateOfExpiry;
    protected $checkStatus;
    protected $comment;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getOutletId()
    {
        return $this->outletId;
    }

    /**
     * @return array
     */
    public function getLicenseType()
    {
        return $this->licenseType;
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
    public function getDateOfIssue()
    {
        return $this->dateOfIssue;
    }

    /**
     * @return string
     */
    public function getDateOfExpiry()
    {
        return $this->dateOfExpiry;
    }

    /**
     * @return array
     */
    public function getCheckStatus()
    {
        return $this->checkStatus;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}