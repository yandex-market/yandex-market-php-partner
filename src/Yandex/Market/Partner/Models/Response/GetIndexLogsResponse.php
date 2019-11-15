<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;
use Yandex\Market\Partner\Models\IndexLog;

class GetIndexLogsResponse extends Model
{
    const STATUS_ERROR = 'ERROR';
    const STATUS_OK = 'OK';

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
     * @return IndexLog|null
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
