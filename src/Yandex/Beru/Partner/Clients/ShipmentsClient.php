<?php

namespace Yandex\Beru\Partner\Clients;

use Yandex\Beru\Partner\Models\Response\ShipmentsResponse;
use Yandex\Beru\Partner\Models\Response\GetShipmentsResponse;
use Yandex\Beru\Partner\Models\Response\GetShipmentResponse;
use Yandex\Beru\Partner\Models\Response\GetShipmentItemsResponse;

class ShipmentsClient extends Client
{
    /**
     * Creates a request
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/post-campaigns-id-shipments-requests-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return ShipmentsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function createShipment($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests.json';
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new ShipmentsResponse($decodedResponseBody);
    }

    /**
     * Returns basic information about the shipments
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return GetShipmentsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getShipments($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetShipmentsResponse($decodedResponseBody);
    }

    /**
     * Returns detailed information about the shipment
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-docpage/
     *
     * @param $campaignId
     * @param $requestId
     * @param array $params
     * @return \Yandex\Beru\Partner\Models\ShipmentRequestDetails
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getShipment($campaignId, $requestId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests/'.$requestId.'.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $GetShipmentResponse = new GetShipmentResponse($decodedResponseBody);

        return $GetShipmentResponse->getShipmentRequest();
    }

    /**
     * Returns the list of goods in the shipment
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-items-docpage/
     *
     * @param $campaignId
     * @param $requestId
     * @param array $params
     * @return GetShipmentItemsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getShipmentItems($campaignId, $requestId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests/'.$requestId.'/items.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetShipmentItemsResponse($decodedResponseBody);
    }

    /**
     * Returns file
     *
     * @see https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-documents-id-docpage/
     *
     * @param $campaignId
     * @param $requestId
     * @param $documentId
     * @return mixed|\SimpleXMLElement
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function downloadDocument($campaignId, $requestId, $documentId)
    {
        $resource = 'campaigns/' . $campaignId . '/shipments/requests/'.$requestId.'/documents/'.$documentId;
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody()->getContents());

        return $decodedResponseBody;
    }
}
