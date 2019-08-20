<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Notes extends ObjectModel
{
    protected $type;
    protected $payload;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }
}
