<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class RecommendedPrice extends Model
{
    protected $marketSku;
    protected $priceSuggestion;

    protected $mappingClasses = [
        'priceSuggestion' => PricesSuggestion::class,
    ];

    /**
     * @return int
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return PricesSuggestion
     */
    public function getPriceSuggestion()
    {
        return $this->priceSuggestion;
    }
}