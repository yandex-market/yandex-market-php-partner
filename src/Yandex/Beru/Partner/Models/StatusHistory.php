<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class StatusHistory extends ObjectModel
{
    /**
     * @param array|object $statusHistoryRow
     *
     * @return StatusHistory
     */
    public function add($statusHistoryRow)
    {
        if (is_array($statusHistoryRow)) {
            $this->collection[] = new StatusHistoryRow($statusHistoryRow);
        } elseif (is_object($statusHistoryRow) && $statusHistoryRow instanceof StatusHistoryRow) {
            $this->collection[] = $statusHistoryRow;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return StatusHistoryRow[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StatusHistoryRow
     */
    public function current()
    {
        return parent::current();
    }
}
