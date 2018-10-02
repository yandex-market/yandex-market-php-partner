<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Bids;
use Yandex\Market\Partner\Models\BidsSettings;
use Yandex\Market\Partner\Models\Response\BidsSettingsResponse;
use Yandex\Market\Partner\Models\Response\GetBidsResponse;
use Yandex\Market\Partner\Models\Response\GetPopularRecommendedBidsMarketResponse;
use Yandex\Market\Partner\Models\Response\GetRecommendedBidsResponse;
use Yandex\Market\Partner\Models\Response\SetBidsResponse;

class BidClient extends Client
{
    /* POST */

    /**
     * Get Bids Info
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-docpage/
     *
     * @return Bids
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBids($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/bids.json';

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['form_params' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getBidsResponse = new GetBidsResponse($decodedResponseBody);
        return $getBidsResponse->getBids();
    }

    /**
     * Get recommended Bids
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-docpage/
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-market-search-docpage/
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-search-docpage/
     *
     * @return Bids
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendedBids($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/bids/recommended.json';

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['form_params' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getBidsSetResponse = new GetRecommendedBidsResponse($decodedResponseBody);
        return $getBidsSetResponse->getBids();
    }

    /**
     * Get recommended by requests in search Yandex Market
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-top-market-search-docpage/
     *
     * @return Bids
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPopularRecommendedBidsMarketSearch($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/bids/recommended/top/market-search.json';

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['form_params' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getBidsSetResponse = new GetPopularRecommendedBidsMarketResponse($decodedResponseBody);
        return $getBidsSetResponse->getBids();
    }

    /* PUT */

    /**
     * Set bids for Offers
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-docpage/
     *
     * @return Bids
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setBids($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/bids.json';

        $response = $this->sendRequest(
            'PUT',
            $this->getServiceUrl($resource),
            ['form_params' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $setBidsSetResponse = new SetBidsResponse($decodedResponseBody);
        return $setBidsSetResponse->getBids();
    }

    /* GET */

    /**
     * Get bids settings
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-bids-settings-docpage/
     *
     * @return BidsSettings
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBidsSettings($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/bids/settings.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getBidsSettingsResponse = new BidsSettingsResponse($decodedResponseBody);
        return $getBidsSettingsResponse->getSettings();
    }
}
