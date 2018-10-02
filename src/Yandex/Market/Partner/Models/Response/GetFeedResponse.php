<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Feed;

class GetFeedResponse extends Model
{
    public $feed;

    protected $mappingClasses = [
        'feed' => Feed::class,
    ];

    /**
     * @return Feed
     */
    public function getFeed()
    {
        return $this->feed;
    }
}
