<?php

namespace Yandex\Market\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class Interval extends Model
{
    protected $date;
    protected $fromTime;
    protected $toTime;

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
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
    public function getDateType()
    {
        return DateTime::createFromFormat("d-m-Y", $this->getDate());
    }
}
