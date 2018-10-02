<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

/**
 * Class Campaigns
 *
 * @package Yandex\Market\Partner\Models\Campaign
 */
class IndexLogRecords extends ObjectModel
{
    /**
     * @param array|object $record
     *
     * @return IndexLogRecords
     */
    public function add($record)
    {
        if (is_array($record)) {
            $this->collection[] = new IndexLogRecord($record);
        } elseif (is_object($record) && $record instanceof IndexLogRecord) {
            $this->collection[] = $record;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return IndexLogRecord[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return IndexLogRecord
     */
    public function current()
    {
        return parent::current();
    }
}
