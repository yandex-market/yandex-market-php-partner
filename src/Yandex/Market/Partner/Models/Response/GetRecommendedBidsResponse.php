<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Market\Partner\Models\Bids;

class GetRecommendedBidsResponse extends GetBidsResponse
{
    protected $propNameMap = [
        'recommendations' => 'bids'
    ];
}
