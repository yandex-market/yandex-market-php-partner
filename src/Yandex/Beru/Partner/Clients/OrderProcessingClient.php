<?php

namespace Yandex\Beru\Partner\Clients;

use Yandex\Beru\Partner\Models\Response\GetUpdateOrderResponse;
use Yandex\Beru\Partner\Models\Response\GetInfoOrderBoxesResponse;
use Yandex\Beru\Partner\Models\Response\GetOrdersResponse;
use Yandex\Beru\Partner\Models\Response\GetOrderResponse;
use Yandex\Beru\Partner\Models\Response\GetDeliveryServiceResponse;

class OrderProcessingClient extends Client
{
    /**
     * Changes order status
     *
     * @https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/put-campaigns-id-orders-id-status-docpage/
     *
     * @param $campaignId
     * @param $orderId
     * @param array $params
     * @return \Yandex\Beru\Partner\Models\Order
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function updateOrderStatus($campaignId, $orderId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/status.json';

        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getUpdateOrderResponse = new GetUpdateOrderResponse($decodedResponseBody);

        return $getUpdateOrderResponse->getOrder();
    }

    /**
     * Sends Beru information about the distribution of goods included in the order, by boxes.
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/put-campaigns-id-orders-id-delivery-shipments-id-boxes-docpage/
     *
     * @param $campaignId
     * @param $orderId
     * @param $shipmentId
     * @param array $params
     * @return \Yandex\Beru\Partner\Models\OrderBoxes
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function putInfoOrderBoxes($campaignId, $orderId, $shipmentId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId .'/delivery/shipments/' . $shipmentId . '/boxes.json';

        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getInfoOrderBoxesResponse = new GetInfoOrderBoxesResponse($decodedResponseBody);

        return $getInfoOrderBoxesResponse->getBoxes();
    }

    /**
     * Returns information about orders.
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-orders-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return GetOrdersResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getOrders($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOrdersResponse($decodedResponseBody);
    }

    /**
     * Returns information about order.
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-orders-id-docpage/
     *
     * @param $campaignId
     * @param $orderId
     * @param array $params
     * @return \Yandex\Beru\Partner\Models\Order
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getOrder($campaignId, $orderId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getOrderResponse = new GetOrderResponse($decodedResponseBody);

        return $getOrderResponse->getOrder();
    }

    /**
     * Return delivery services
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-delivery-services-docpage/
     *
     * @return \Yandex\Beru\Partner\Models\DeliveryServices
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getDeliveryService()
    {
        $resource = 'delivery/services.json';
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getDeliveryServiceResponse = new GetDeliveryServiceResponse($decodedResponseBody['result']);

        return $getDeliveryServiceResponse->getDeliveryService();
    }
}
