<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;
use Yandex\Market\Partner\Models\Items;

class TransferCisResponse extends Model
{
    const STATUS_ERROR = 'ERROR';
    const STATUS_OK = 'OK';

    protected $status;
    protected $result;
    protected $errors;

    protected $mappingClasses = [
        'result' => Items::class,
        'errors' => Errors::class,
    ];

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Items
     */
    public function getItems()
    {
        return $this->result;
    }

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
