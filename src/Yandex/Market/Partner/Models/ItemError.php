<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class ItemError extends Model
{
    const TYPE_DOWNLOAD_ERROR = 'DOWNLOAD_ERROR';
    const TYPE_DOWNLOAD_HTTP_ERROR = 'DOWNLOAD_HTTP_ERROR';

    protected $httpStatusCode;
    protected $type;
    protected $description;

    /**
     * @return Integer
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * @return String
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }
}
