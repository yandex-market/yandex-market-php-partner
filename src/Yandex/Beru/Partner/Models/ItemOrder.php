<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class ItemOrder extends Model
{
    protected $id;
    protected $offerId;
    protected $count;
    protected $price;
    protected $vat;
    protected $promos;

    protected $mappingClasses = [
        'promos' => Promos::class,
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOfferId()
    {
        return $this->offerId;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @return Promos
     */
    public function getPromos()
    {
        return $this->promos;
    }
}