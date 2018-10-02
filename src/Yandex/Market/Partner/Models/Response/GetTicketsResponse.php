<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Tickets;

class GetTicketsResponse extends Model
{
    protected $tickets;
    protected $mappingClasses = [
        'tickets' => Tickets::class,
    ];

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    /**
     * @return Tickets
     */
    public function getTickets()
    {
        return $this->tickets;
    }
}
