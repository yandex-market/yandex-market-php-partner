<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class DeliveryOutlet extends Model
{
    protected $code;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
