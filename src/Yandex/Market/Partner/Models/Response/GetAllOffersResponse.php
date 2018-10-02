<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Offers;

class GetAllOffersResponse extends Model
{
    protected $offers;
    protected $pager;

    protected $mappingClasses = [
        'offers' => Offers::class,
    ];

    /**
     * @return Offers
     */
    public function getOffers()
    {
        return $this->offers;
    }
}
