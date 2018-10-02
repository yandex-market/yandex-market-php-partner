<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Feeds;

class GetFeedsResponse extends Model
{
    public $feeds;

    protected $mappingClasses = [
        'feeds' => Feeds::class,
    ];

    /**
     * @return Feeds
     */
    public function getFeeds()
    {
        return $this->feeds;
    }
}
