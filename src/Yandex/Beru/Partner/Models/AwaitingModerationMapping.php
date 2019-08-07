<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class AwaitingModerationMapping extends ObjectModel
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