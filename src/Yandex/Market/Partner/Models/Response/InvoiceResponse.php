<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;
use Yandex\Market\Partner\Models\Invoices;

class InvoiceResponse extends Model
{
    protected $status;
    protected $errors;
    protected $result;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => Invoices::class,
    ];

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Invoices|null
     */
    public function getInvoices()
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
