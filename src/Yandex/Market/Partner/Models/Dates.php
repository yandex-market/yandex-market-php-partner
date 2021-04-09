<?php

namespace Yandex\Market\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class Dates extends Model
{
    protected $fromDate;
    protected $toDate;
    protected $fromTime;
    protected $toTime;
    protected $intervals;

    protected $mappingClasses = [
        'intervals' => Intervals::class,
    ];

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
     * @return string
     */
    public function getFromTime()
    {
        return $this->fromTime;
    }

    /**
     * @return string
     */
    public function getToTime()
    {
        return $this->toTime;
    }

    /**
     * @return DateTime|false
     */
    public function getFromDateType()
    {
        return DateTime::createFromFormat("d-m-Y", $this->getFromDate());
    }

    /**
     * @return DateTime|false
     */
    public function getToDateType()
    {
        return DateTime::createFromFormat("d-m-Y", $this->getToDate());
    }

    /**
     * @return mixed
     */
    public function getIntervals()
    {
        return $this->intervals;
    }
}
