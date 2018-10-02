<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class ScheduleItem extends Model
{
    protected $startDay;
    protected $endDay;
    protected $startTime;
    protected $endTime;

    /**
     * @return string
     */
    public function getStartDay()
    {
        return $this->startDay;
    }

    /**
     * @return string
     */
    public function getEndDay()
    {
        return $this->endDay;
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->endTime;
    }
}
