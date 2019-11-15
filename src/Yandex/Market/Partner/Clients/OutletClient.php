<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\DeliveryServices;
use Yandex\Market\Partner\Models\Outlet;
use Yandex\Market\Partner\Models\Response\DeliveryServicesResponse;
use Yandex\Market\Partner\Models\Response\GetOutletsLicensesResponse;
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

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
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

        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['json' => $params]
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

    /**
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/post-campaigns-id-outlets-licenses-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function createOutletsLicenses($campaignId,  array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/outlets/licenses.json';

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/delete-campaigns-id-outlets-licenses-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function deleteOutletsLicenses($campaignId,  array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/outlets/licenses.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('DELETE', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * Get outlets licenses
     *
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/get-campaigns-id-outlets-licenses-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return GetOutletsLicensesResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getOutletsLicenses($campaignId,  array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/outlets/licenses.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOutletsLicensesResponse($decodedResponseBody);
    }

    /**
     * Get delivery services
     *
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/get-delivery-services-docpage/
     *
     * @return DeliveryServices
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getDeliveryServices()
    {
        $resource = 'delivery/services.json';
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());
        $getDeliveryServiceResponse = new DeliveryServicesResponse($decodedResponseBody['result']);

        return $getDeliveryServiceResponse->getDeliveryService();
    }
}
