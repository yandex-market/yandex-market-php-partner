<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Errors;
use Yandex\Market\Partner\Models\FeedbackResult;

class GetFeedbackResponse extends Model
{
    protected $status;
    protected $result;
    protected $errors;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => FeedbackResult::class,
    ];

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

    /**
     * @return FeedbackResult
     */
    public function getResult()
    {
        return $this->result;
    }
}
