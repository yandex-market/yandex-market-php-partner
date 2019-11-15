<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;
use Yandex\Market\Partner\Models\OfferPrices;

class GetOfferPricesResponse extends Model
{
    const STATUS_ERROR = 'ERROR';
    const STATUS_OK = 'OK';

    protected $result;
    protected $status;
    protected $errors;

    protected $mappingClasses = [
        'result' => OfferPrices::class,
        'errors' => Errors::class,
    ];

    /**
     * @return OfferPrices
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
