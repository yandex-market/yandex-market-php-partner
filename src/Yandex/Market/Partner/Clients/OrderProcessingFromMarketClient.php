<?php

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Response\AcceptOrderResponse;
use Yandex\Market\Partner\Models\Response\GetCartResponse;

class OrderProcessingFromMarketClient extends Client
{
    /**
     * Sends the store a list of items in the shopping cart
     *
     * @see https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/post-cart.html
     *
     * @param $response
     * @return GetCartResponse
     */
    public function getCart($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);

        return new GetCartResponse($decodedResponseBody);
    }

    /**
     * Sends a new order to the store
     *
     * @see https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/post-order-accept.html
     *
     * @param $response
     * @return AcceptOrderResponse
     */
    public function acceptOrder($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);

        return new AcceptOrderResponse($decodedResponseBody);
    }

    /**
     * Notifies the store about changing the status of the order.
     *
     * @see https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/post-order-status.html
     *
     * @param $response
     * @return AcceptOrderResponse
     */
    public function orderStatus($response)
    {
        $decodedResponseBody = $this->getDecodedBody($response);

        return new AcceptOrderResponse($decodedResponseBody);
    }

    /**
     * @param $response
     * @return array
     */
    public function getResponse($response)
    {
        return $this->getDecodedBody($response);
    }
}
