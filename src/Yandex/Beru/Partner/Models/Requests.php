<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Requests extends ObjectModel
{
    /**
     * @param array|object $request
     *
     * @return Requests
     */
    public function add($request)
    {
        if (is_array($request)) {
            $this->collection[] = new Request($request);
        } elseif (is_object($request) && $request instanceof Request) {
            $this->collection[] = $request;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Request[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Request
     */
    public function current()
    {
        return parent::current();
    }
}