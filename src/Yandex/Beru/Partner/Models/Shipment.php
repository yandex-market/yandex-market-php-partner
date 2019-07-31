<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Shipment extends Model
{
    protected $id;
    protected $boxes;

    protected $mappingClasses = [
        'boxes' => Boxes::class,
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getBoxes()
    {
        return $this->boxes;
    }
}
