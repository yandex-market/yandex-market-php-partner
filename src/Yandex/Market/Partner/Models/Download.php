<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Download extends Model
{
    public $status;
    public $error;

    protected $mappingClasses = [
        'error' => ItemError::class,
    ];

    /**
     * @return String
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return ItemError
     */
    public function getError()
    {
        return $this->error;
    }
}
