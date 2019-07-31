<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\Cart;
use Yandex\Common\Model;

class GetCartResponse extends Model
{
    protected $cart;

    protected $mappingClasses = [
        'cart' => Cart::class,
    ];

    /**
     * @return Cart
     */
    public function getCart()
    {
        return $this->cart;
    }
}
