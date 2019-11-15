<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class Period extends Model
{
    protected $fromDate;
    protected $toDate;

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
     * @return string
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @return string
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getFromDateTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_PUBLIC, $this->getFromDate());
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getToDateTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_PUBLIC, $this->getToDate());
    }
}
