<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Beru\Partner\Models\OfferPrices;

class GetOfferPricesResponse extends Model
{
    protected $total;
    protected $offers;
    protected $paging;

    protected $mappingClasses = [
        'offers' => OfferPrices::class,
    ];

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    /**
     * @return OfferPrices
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        if (isset($this->paging['nextPageToken'])) {
            return $this->paging['nextPageToken'];
        }
        return null;
    }
}
