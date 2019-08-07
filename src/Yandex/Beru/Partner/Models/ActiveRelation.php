<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class ActiveRelation extends ObjectModel
{
    protected $offer;
    protected $mapping;
    protected $awaitingModerationMapping;
    protected $rejectedMapping;

    protected $mappingClasses = [
        'offer' => ActiveRelationOffer::class,
        'mapping' => Mapping::class,
        'awaitingModerationMapping' => AwaitingModerationMapping::class,
        'rejectedMapping' => RejectedMapping::class,
    ];

    /**
     * @return ActiveRelationOffer
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @return Mapping
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * @return AwaitingModerationMapping
     */
    public function getAwaitingModerationMapping()
    {
        return $this->awaitingModerationMapping;
    }

    /**
     * @return RejectedMapping
     */
    public function getRejectedMapping()
    {
        return $this->rejectedMapping;
    }
}
