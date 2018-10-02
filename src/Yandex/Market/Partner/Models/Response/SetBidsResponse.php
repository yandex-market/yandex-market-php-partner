<?php

namespace Yandex\Market\Partner\Models\Response;

class SetBidsResponse extends GetBidsResponse
{
    protected $propNameMap = [
        'bidsSet' => 'bids',
    ];
}
