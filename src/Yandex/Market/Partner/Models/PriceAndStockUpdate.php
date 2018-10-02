<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class PriceAndStockUpdate extends Model
{
    public $fileTime;
    public $publishedTime;

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
