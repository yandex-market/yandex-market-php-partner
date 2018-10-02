<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Content extends Model
{
    public $rejectedOffersCount;
    public $status;
    public $totalOffersCount;
    public $error;

    protected $mappingClasses = [
        'error' => ContentError::class,
    ];

    /**
     * @return Integer
     */
    public function getRejectedOffersCount()
    {
        return $this->rejectedOffersCount;
    }

    /**
     * @return String
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Integer
     */
    public function getTotalOffersCount()
    {
        return $this->totalOffersCount;
    }

    /**
     * @return ContentError
     */
    public function getError()
    {
        return $this->error;
    }
}
