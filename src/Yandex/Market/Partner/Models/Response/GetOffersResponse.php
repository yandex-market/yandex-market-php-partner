<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Pager;
use Yandex\Market\Partner\Models\Offers;

class GetOffersResponse extends Model
{
    protected $offers;
    protected $pager;

    protected $mappingClasses = [
        'offers' => Offers::class,
        'pager' => Pager::class,
    ];

    /**
     * @return Offers
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @return Pager
     */
    public function getPager()
    {
        return $this->pager;
    }
}
