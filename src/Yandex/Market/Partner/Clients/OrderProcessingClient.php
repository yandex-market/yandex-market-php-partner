<?php

namespace Yandex\Market\Partner\Clients;

use GuzzleHttp\Exception\GuzzleException;
use Yandex\Common\Exception\ForbiddenException;
use Yandex\Common\Exception\UnauthorizedException;
use Yandex\Market\Partner\Exception\PartnerRequestException;
use Yandex\Market\Partner\Models\Response\GetBuyerResponse;
use Yandex\Market\Partner\Models\Response\GetDeliveryServiceResponse;
use Yandex\Market\Partner\Models\Response\GetOrderResponse;
use Yandex\Market\Partner\Models\Response\GetOrdersResponse;
use Yandex\Market\Partner\Models\Response\GetUpdateOrderResponse;
use Yandex\Market\Partner\Models\Response\TransferCisResponse;

class OrderProcessingClient extends Client
{
    /**
     * Changes order status
     *
     * @https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/put-campaigns-id-orders-id-status.html
     *
     * @param $campaignId
     * @param $orderId
     * @param array $params
     * @param null $dbgKey
     * @return GetUpdateOrderResponse
     * @throws GuzzleException
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
     */
    public function updateOrderStatus($campaignId, $orderId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/status.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetUpdateOrderResponse($decodedResponseBody);
    }

    /**
     * Transfer of product identification codes
     *
     * @https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/put-campaigns-id-orders-id-cis.html
     *
     * @param $campaignId
     * @param $orderId
     * @param array $params
     * @param null $dbgKey
     * @return TransferCisResponse
     * @throws GuzzleException
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
     */
    public function transferCis($campaignId, $orderId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/cis.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new TransferCisResponse($decodedResponseBody);
    }

    /**
     * Get order info
     *
     * @https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/get-campaigns-id-orders-id.html
     *
     * @param $campaignId
     * @param $orderId
     * @param array $params
     * @param null $dbgKey
     * @return GetOrderResponse
     * @throws GuzzleException
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
     */
    public function getOrder($campaignId, $orderId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOrderResponse($decodedResponseBody);
    }

    /**
     * Get orders info
     *
     * @https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/get-campaigns-id-orders.html
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return GetOrdersResponse
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws PartnerRequestException
     * @throws UnauthorizedException
     */
    public function getOrders($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/orders.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOrdersResponse($decodedResponseBody);
    }

    /**
     * Return delivery services
     *
     * @https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/get-delivery-services.html
     *
     * @param null $dbgKey
     * @return GetDeliveryServiceResponse
     * @throws GuzzleException
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
     */
    public function getDeliveryService($dbgKey = null)
    {
        $resource = 'delivery/services.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetDeliveryServiceResponse($decodedResponseBody['result']);
    }

    /**
     * Return buyer info
     *
     * @https://yandex.ru/dev/market/partner-dsbs/doc/dg/reference/get-campaigns-id-order-id-buyer.html
     *
     * @param $campaignId
     * @param $orderId
     * @param array $params
     * @param null $dbgKey
     * @return GetBuyerResponse
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws PartnerRequestException
     * @throws UnauthorizedException
     */
    public function getBuyer($campaignId, $orderId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/orders/' . $orderId . '/buyer.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetBuyerResponse($decodedResponseBody);
    }
}
