<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Placement extends Model
{
    public $totalOffersCount;

    /**
     * @return int
     */
    public function getTotalOffersCount()
    {
        return $this->totalOffersCount;
    }
}
