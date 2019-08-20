<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Box extends Model
{
    protected $id;
    protected $weight;
    protected $width;
    protected $height;
    protected $depth;
    protected $items;
    protected $fulfilmentId;

    protected $mappingClasses = [
        'items' => Items::class,
    ];

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
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @return Items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getFulfilmentId()
    {
        return $this->fulfilmentId;
    }
}
