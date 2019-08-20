<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Beru\Partner\Models\RecommendedRelationship;

class GetRecommendedRelationshipResponse extends Model
{
    protected $offers;

    protected $mappingClasses = [
        'offers' => RecommendedRelationship::class,
    ];

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    /**
     * @return RecommendedRelationship
     */
    public function getOffers()
    {
        return $this->offers;
    }
}