<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class IndexLogOffer extends Model
{
    public $rejectedCount;
    public $totalCount;

    /**
     * @return Integer
     */
    public function getRejectedCount()
    {
        return $this->rejectedCount;
    }

    /**
     * @return Integer
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }
}
