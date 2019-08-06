<?php

namespace Yandex\Beru\Partner\Clients;

use Yandex\Beru\Partner\Models\Response\HiddenOffersResponse;
use Yandex\Beru\Partner\Models\Response\PostResponse;

class HiddenOffersClient extends Client
{
    /**
     * Hidden offers list
     *
     * @see https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-hidden-offers-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return HiddenOffersResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function getInfo($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new HiddenOffersResponse($decodedResponseBody['result']);
    }

    /**
     * Hide offers and hide settings
     *
     * @https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-hidden-offers-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function hideOffers($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * Show offers
     *
     * @https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/delete-campaigns-id-hidden-offers-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Beru\Partner\Exception\PartnerRequestException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     */
    public function showOffers($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';
        $response = $this->sendRequest(
            'DELETE',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }
}
