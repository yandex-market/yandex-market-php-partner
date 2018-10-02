<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class LocalRegion extends Model
{
    protected $id;
    protected $name;
    protected $type;
    protected $delivery;

    protected $mappingClasses = [
        'delivery' => Delivery::class,
    ];

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }
}
