<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;
use Yandex\Market\Partner\Models\InfoForInvoice;

class GetInfoForInvoiceResponse extends Model
{
    protected $status;
    protected $errors;
    protected $result;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => InfoForInvoice::class,
    ];

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return InfoForInvoice|null
     */
    public function getResult()
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
