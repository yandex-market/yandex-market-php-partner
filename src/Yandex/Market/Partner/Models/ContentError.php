<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class ContentError extends Model
{
    protected $type;

    /**
     * @return String
     */
    public function getType()
    {
        return $this->type;
    }
}
