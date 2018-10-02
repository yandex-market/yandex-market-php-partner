<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class WorkingSchedule extends Model
{
    protected $workInHoliday;
    protected $scheduleItems;

    protected $mappingClasses = [
        'scheduleItems' => ScheduleItems::class,
    ];

    /**
     * @return bool
     */
    public function getWorkInHoliday()
    {
        return $this->workInHoliday;
    }

    /**
     * @return ScheduleItems
     */
    public function getScheduleItems()
    {
        return $this->scheduleItems;
    }
}
