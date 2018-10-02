<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class ScheduleItems extends ObjectModel
{
    /**
     * @param array|object $schedule
     *
     * @return ScheduleItems
     */
    public function add($schedule)
    {
        if (is_array($schedule)) {
            $this->collection[] = new ScheduleItem($schedule);
        } elseif (is_object($schedule) && $schedule instanceof ScheduleItem) {
            $this->collection[] = $schedule;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return ScheduleItem[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return ScheduleItem
     */
    public function current()
    {
        return parent::current();
    }
}
