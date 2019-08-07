<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class ProcessingState extends ObjectModel
{
    protected $status;
    protected $notes;

    protected $mappingClasses = [
        'notes' => Notes::class,
    ];

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Notes
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
