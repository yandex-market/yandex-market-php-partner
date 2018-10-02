<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;

class PostResponse extends Model
{
    protected $errors;
    protected $status;
    protected $result;

    protected $mappingClasses = [
        'errors' => Errors::class,
    ];

    /**
     * @return Errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }
}
