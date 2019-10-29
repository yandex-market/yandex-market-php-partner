<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;
use Yandex\Market\Partner\Models\Licenses;

class GetOutletsLicensesResponse extends Model
{
    protected $status;
    protected $errors;
    protected $result;

    protected $mappingClasses = [
        'result' => Licenses::class,
        'errors' => Errors::class,
    ];

    /**
     * @return Licenses
     */
    public function getLicenses()
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
}