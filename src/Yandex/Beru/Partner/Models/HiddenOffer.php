<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class HiddenOffer extends Model
{
    protected $comment;
    protected $marketSku;
    protected $ttlInHours;

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return int
     */
    public function getMarkerSku()
    {
        return $this->marketSku;
    }

    /**
     * @return int
     */
    public function getTtlInHours()
    {
        return $this->ttlInHours;
    }
}