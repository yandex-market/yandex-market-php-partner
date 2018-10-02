<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Market\Partner\Models\Bids;

class GetBidsSetResponse extends GetBidsResponse
{
    protected $mappingClasses = [
        'bidsSet' => Bids::class,
    ];
}
