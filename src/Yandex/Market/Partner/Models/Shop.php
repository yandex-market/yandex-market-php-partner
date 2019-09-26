<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Shop extends Model
{
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}