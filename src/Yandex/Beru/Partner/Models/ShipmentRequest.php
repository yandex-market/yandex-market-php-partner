<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class ShipmentRequest extends Model
{
    protected $id;
    protected $type;
    protected $status;
    protected $requestedDate;
    protected $updatedAt;
    protected $itemsTotalCount;
    protected $hasShortage;
    protected $hasDefects;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getRequestedDate()
    {
        return $this->requestedDate;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return int
     */
    public function getItemsTotalCount()
    {
        return $this->itemsTotalCount;
    }

    /**
     * @return bool
     */
    public function getHasShortage()
    {
        return $this->hasShortage;
    }

    /**
     * @return mixed
     */
    public function getHasDefects()
    {
        return $this->hasDefects;
    }
}
