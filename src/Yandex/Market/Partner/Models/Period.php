<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Period extends Model
{
    protected $fromDate;
    protected $toDate;

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
}
