<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Item extends Model
{
    protected $count;
    protected $offerId;

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getOfferId()
    {
        return $this->offerId;
    }
}
