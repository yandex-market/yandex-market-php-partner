<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Outlet;
use Yandex\Market\Partner\Models\Response\GetOutletsResponse;
use Yandex\Market\Partner\Models\Response\PostResponse;

class OutletClient extends Client
{
    /* GET */

    /**
     * Get outlets by Campaign
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-outlets-docpage/
     *
     * @return GetOutletsResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOutletsInfo($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/outlets.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOutletsResponse($decodedResponseBody);
    }

    /**
     * Get outlet by ID
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-outlets-id-docpage/
     *
     * @return Outlet
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOutletInfo($campaignId, $outletId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/outlets/' . $outletId . '.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new Outlet($decodedResponseBody);
    }

    /* POST */

    /**
     * Create new outlet
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-outlets-docpage/
     *
     * @return PostResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createOutlet($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/outlets.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['form_params' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /*PUT */

    /**
     * Update outlet
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/put-campaigns-id-outlets-id-docpage/
     *
     * @return PostResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateOutlet($campaignId, $outletId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/outlets/' . $outletId . '.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['form_params' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /* DELETE */

    /**
     * Delete outlet
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/delete-campaigns-id-outlets-id-docpage/
     *
     * @return PostResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteOutlet($campaignId, $outletId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/outlets/' . $outletId . '.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('DELETE', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }
}
