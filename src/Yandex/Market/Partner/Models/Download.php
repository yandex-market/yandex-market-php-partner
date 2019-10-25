<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Download extends Model
{
    const STATUS_ERROR = 'ERROR';
    const STATUS_NA = 'NA';
    const STATUS_OK = 'OK';

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
     * @return ItemError|null
     */
    public function getError()
    {
        return $this->error;
    }
}
