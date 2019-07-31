<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class StatusHistoryRow extends ObjectModel
{
    protected $date;
    protected $status;

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
    public function getStatus()
    {
        return $this->status;
    }
}