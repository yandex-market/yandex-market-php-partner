<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Balance;

class GetBalanceResponse extends Model
{
    protected $balance;

    protected $mappingClasses = [
        'balance' => Balance::class,
    ];

    /**
     * @return Balance
     */
    public function getBalance()
    {
        return $this->balance;
    }
}
