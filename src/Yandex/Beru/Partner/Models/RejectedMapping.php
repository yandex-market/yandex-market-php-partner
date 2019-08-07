<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class RejectedMapping extends ObjectModel
{
    protected $marketSku;

    /**
     * @return int
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }
}