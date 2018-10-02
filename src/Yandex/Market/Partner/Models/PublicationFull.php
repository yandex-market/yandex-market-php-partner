<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class PublicationFull extends Model
{
    protected $fileTime;
    protected $publishedTime;

    /**
     * @return String
     */
    public function getFileTime()
    {
        return $this->fileTime;
    }

    /**
     * @return String
     */
    public function getPublishedTime()
    {
        return $this->publishedTime;
    }
}
