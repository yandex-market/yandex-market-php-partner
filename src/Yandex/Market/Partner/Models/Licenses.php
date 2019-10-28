<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Licenses extends ObjectModel
{
    public function __construct($data = [])
    {
        parent::__construct($data['licenses']);
    }

    /**
     * @param array|object $license
     *
     * @return Licenses
     */
    public function add($license)
    {
        if (is_array($license)) {
            $this->collection[] = new License($license);
        } elseif (is_object($license) && $license instanceof License) {
            $this->collection[] = $license;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return License[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return License
     */
    public function current()
    {
        return parent::current();
    }
}