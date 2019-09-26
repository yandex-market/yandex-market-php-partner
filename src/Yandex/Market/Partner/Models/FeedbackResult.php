<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class FeedbackResult extends Model
{
    protected $feedbackList;
    protected $paging;

    protected $mappingClasses = [
        'feedbackList' => FeedbackList::class,
    ];

    /**
     * @return FeedbackList|null
     */
    public function getFeedbackList()
    {
        return $this->feedbackList;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        if (isset($this->paging['nextPageToken'])) {
            return $this->paging['nextPageToken'];
        }
        return null;
    }
}