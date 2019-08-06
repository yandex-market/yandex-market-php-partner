<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Period extends Model
{
    protected $start;
    protected $end;

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }
}
