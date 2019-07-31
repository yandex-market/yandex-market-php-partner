<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\Requests;
use Yandex\Common\Model;

class GetShipmentsResponse extends Model
{
    protected $requests;
    protected $paging;

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    protected $mappingClasses = [
        'requests' => Requests::class,
    ];

    /**
     * @return Requests
     */
    public function getRequests()
    {
        return $this->requests;
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
