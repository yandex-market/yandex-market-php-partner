<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Bids;

class GetBidsResponse extends Model
{
    protected $bids;

    protected $mappingClasses = [
        'bids' => Bids::class,
    ];

    /**
     * @return Bids
     */
    public function getBids()
    {
        return $this->bids;
    }
}
