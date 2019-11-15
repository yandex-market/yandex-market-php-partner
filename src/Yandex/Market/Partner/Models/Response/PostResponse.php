<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;

class PostResponse extends Model
{
    const STATUS_ERROR = 'ERROR';
    const STATUS_OK = 'OK';

    protected $errors;
    protected $status;
    protected $result;

    protected $mappingClasses = [
        'errors' => Errors::class,
    ];

    /**
     * @return Errors|null
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
     * @return array|null
     */
    public function getResult()
    {
        return $this->result;
    }
}
