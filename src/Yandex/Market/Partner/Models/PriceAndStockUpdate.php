<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class PriceAndStockUpdate extends Model
{
    public $fileTime;
    public $publishedTime;

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
     * @return String
     */
    public function getFileTime()
    {
        return $this->fileTime;
    }

    /**
     * @return String
     */
    public function getPublishedTime()
    {
        return $this->publishedTime;
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getFileTimeTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getFileTime());
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getPublishedTimeTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getPublishedTime());
    }

}
