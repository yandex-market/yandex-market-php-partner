<?php

namespace Yandex\Market\Partner\Models\Common;

use Yandex\Common\Model;

class Error extends Model
{
    protected $code;
    protected $message;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
