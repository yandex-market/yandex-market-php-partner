<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Market\Partner\Models\Bids;

class GetPopularRecommendedBidsMarketResponse extends GetBidsResponse
{
    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    protected $propNameMap = [
        'topRecommendations' => 'bids',
    ];
}
