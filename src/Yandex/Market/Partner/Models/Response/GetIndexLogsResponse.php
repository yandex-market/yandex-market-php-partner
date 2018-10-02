<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;
use Yandex\Market\Partner\Models\IndexLog;

class GetIndexLogsResponse extends Model
{
    protected $indexLog;
    protected $status;
    protected $errors;
    protected $result;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => IndexLog::class,
    ];

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return IndexLog
     */
    public function getResult()
    {
        return $this->result;
    }
}
