<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Pcp extends Model
{
    protected $person;
    protected $contract;
    protected $paysyses;

    protected $mappingClasses = [
        'person' => Person::class,
        'contract' => Contract::class,
        'paysyses' => Paysyses::class,
    ];

    /**
     * @return Contract|null
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @return Paysyses|null
     */
    public function getPaysyses()
    {
        return $this->paysyses;
    }

    /**
     * @return Person|null
     */
    public function getPerson()
    {
        return $this->person;
    }
}
