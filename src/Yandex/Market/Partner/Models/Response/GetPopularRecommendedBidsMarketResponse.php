<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Bids;
use Yandex\Market\Partner\Models\Common\Errors;

class GetPopularRecommendedBidsMarketResponse extends Model
{
    protected $errors;
    protected $topRecommendations;

    protected $mappingClasses = [
        'topRecommendations' => Bids::class,
        'errors' => Errors::class,
    ];

    public function __construct($data = [])
    {
        if(isset($data['errors'])) {
            $this->errors = $data['errors'];
        }
        parent::__construct($data['result']);
    }

    /**
     * @return Bids
     */
    public function getBids()
    {
        return $this->topRecommendations;
    }

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
