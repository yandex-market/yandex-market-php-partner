<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Report;

class GetReportResponse extends Model
{
    protected $result;

    protected $mappingClasses = [
        'result' => Report::class,
    ];

    /**
     * @return Report
     */
    public function getResult()
    {
        return $this->result;
    }
}
