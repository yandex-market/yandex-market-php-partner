<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Instance extends Model
{
    protected $cis;

    /**
     * @return string
     */
    public function getCis()
    {
        return $this->cis;
    }
}
