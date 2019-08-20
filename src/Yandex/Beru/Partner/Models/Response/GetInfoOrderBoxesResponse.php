<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\OrderBoxes;
use Yandex\Common\Model;

class GetInfoOrderBoxesResponse extends Model
{
    protected $boxes;

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    protected $mappingClasses = [
        'boxes' => OrderBoxes::class,
    ];

    /**
     * @return OrderBoxes
     */
    public function getBoxes()
    {
        return $this->boxes;
    }
}