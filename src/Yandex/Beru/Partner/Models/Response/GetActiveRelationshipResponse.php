<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\ActiveRelationship;
use Yandex\Common\Model;

class GetActiveRelationshipResponse extends Model
{
    protected $offerMappingEntries;
    protected $paging;

    protected $mappingClasses = [
        'offerMappingEntries' => ActiveRelationship::class,
    ];

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    /**
     * @return ActiveRelationship
     */
    public function getOfferMappingEntries()
    {
        return $this->offerMappingEntries;
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