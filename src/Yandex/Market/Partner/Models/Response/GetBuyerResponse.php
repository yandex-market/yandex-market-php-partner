<?php

namespace Yandex\Market\Partner\Models\Response;

use Exception;
use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Buyer;
use Yandex\Market\Partner\Models\Common\Errors;

class GetBuyerResponse extends Model
{
    protected $status;
    protected $errors;
    protected $result;

    protected $mappingClasses = [
        'result' => Buyer::class,
        'errors' => Errors::class,
    ];

    /**
     * @return string
     * @throws Exception
     */
    public function getStatus()
    {
        if($this->status == 'ERROR') {
            throw new Exception();
        }
        return $this->status;
    }

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return Buyer|null
     */
    public function getResult()
    {
        return $this->result;
    }
}
