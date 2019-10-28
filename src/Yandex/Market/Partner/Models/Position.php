<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Position extends Model
{
    protected $bid;
    protected $pos;
    protected $error;

    /**
     * @return float
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @return mixed
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }
}