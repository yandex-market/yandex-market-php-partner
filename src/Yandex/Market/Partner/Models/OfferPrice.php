<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class OfferPrice extends Model
{
    public $feed;
    public $id;
    public $price;
    public $updatedAt;

    protected $mappingClasses = [
        'price' => Price::class,
    ];

    /**
     * @return int
     */
    public function getFeedId()
    {
        return $this->feed['id'];
    }

    /**
     * @return String
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return String
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
