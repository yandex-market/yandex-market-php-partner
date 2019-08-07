<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Mapping extends ObjectModel
{
    protected $marketSku;
    protected $categoryId;

    /**
     * @return int
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }
}