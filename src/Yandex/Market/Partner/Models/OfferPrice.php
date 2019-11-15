<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

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
     * @var DateType
     */
    private $dateType;

    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->dateType = new DateType();
    }

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

    /**
     * @return \DateTimeImmutable|false
     */
    public function getUpdatedAtTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getUpdatedAt());
    }
}
