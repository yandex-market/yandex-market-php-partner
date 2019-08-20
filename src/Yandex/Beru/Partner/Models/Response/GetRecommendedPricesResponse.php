<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\RecommendedPrices;
use Yandex\Common\Model;

class GetRecommendedPricesResponse extends Model
{
    protected $offers;

    protected $mappingClasses = [
        'offers' => RecommendedPrices::class,
    ];

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    /**
     * @return RecommendedPrices
     */
    public function getOffers()
    {
        return $this->offers;
    }
}
