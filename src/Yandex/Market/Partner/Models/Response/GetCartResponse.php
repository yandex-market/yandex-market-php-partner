<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Cart;

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
