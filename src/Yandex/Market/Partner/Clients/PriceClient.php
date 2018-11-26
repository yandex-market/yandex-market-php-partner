<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Response\GetOfferPricesResponse;
use Yandex\Market\Partner\Models\Response\PostResponse;

class PriceClient extends Client
{
    /**
     * Specify offer price without feeds
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-offer-prices-updates-docpage/
     *
     * @return PostResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updatePrices($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/offer-prices/updates.json';

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * Delete all prices which specified by API
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-offer-prices-removals-docpage/
     *
     * @return PostResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deletePrices($campaignId)
    {
        $resource = 'campaigns/' . $campaignId . '/offer-prices/removals.json';

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' =>
                [
                    'removeAll' => true,
                ],
            ]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * Get all prices which specified by API
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-offer-prices-docpage/
     *
     * @return GetOfferPricesResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOfferPrices($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/offer-prices.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOfferPricesResponse($decodedResponseBody);
    }
}
