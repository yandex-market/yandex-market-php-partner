<?php

namespace Yandex\Market\Partner\Models\Response;

use Exception;
use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Bids;
use Yandex\Market\Partner\Models\Common\Errors;

class GetBidsResponse extends Model
{
    protected $status;
    protected $errors;
    protected $bids;

    protected $mappingClasses = [
        'bids' => Bids::class,
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
        return $this->bids;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getStatus()
    {
        if($this->status == 'ERROR') {
            throw new Exception();
        }
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
