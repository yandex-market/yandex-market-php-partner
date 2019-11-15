<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Bids;
use Yandex\Market\Partner\Models\Common\Errors;

class SetBidsResponse extends Model
{
    protected $status;
    protected $errors;
    protected $bidsSet;

    protected $mappingClasses = [
        'bidsSet' => Bids::class,
        'errors' => Errors::class,
    ];

    public function __construct($data = [])
    {
        $this->status = $data['status'];
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
        return $this->bidsSet;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
