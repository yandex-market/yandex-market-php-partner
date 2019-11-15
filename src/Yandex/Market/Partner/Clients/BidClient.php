<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Exception;
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
     * @param $campaignId
     * @param array $params
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBids($campaignId, array $params = [])
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/bids.json';
            $response = $this->sendRequest(
                'POST',
                $this->getServiceUrl($resource),
                ['json' => $params]
            );
            $decodedResponseBody = $this->getDecodedBody($response->getBody());

            return new GetBidsResponse($decodedResponseBody);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *  Get recommended Bids
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-docpage/
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-market-search-docpage/
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-search-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param array $getParams
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getRecommendedBids($campaignId, array $params = [], array $getParams = [])
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/recommendations/bids.json';
            $resource .= '?' . $this->buildQueryString($getParams);
            $response = $this->sendRequest(
                'POST',
                $this->getServiceUrl($resource),
                ['json' => $params]
            );
            $decodedResponseBody = $this->getDecodedBody($response->getBody());

            return new GetRecommendedBidsResponse($decodedResponseBody);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get recommended by requests in search Yandex Market
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-top-market-search-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getPopularRecommendedBidsMarketSearch($campaignId, array $params = [])
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/bids/recommended/top/market-search.json';
            $response = $this->sendRequest(
                'POST',
                $this->getServiceUrl($resource),
                ['json' => $params]
            );
            $decodedResponseBody = $this->getDecodedBody($response->getBody());

            return new GetPopularRecommendedBidsMarketResponse($decodedResponseBody);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /* PUT */

    /**
     * Set bids for Offers
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function setBids($campaignId, array $params = [])
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/bids.json';
            $response = $this->sendRequest(
                'PUT',
                $this->getServiceUrl($resource),
                ['json' => $params]
            );
            $decodedResponseBody = $this->getDecodedBody($response->getBody());

            return new SetBidsResponse($decodedResponseBody);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /* GET */

    /**
     * Get recommended bids setting
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-bids-settings-docpage/
     *
     * @return string
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBidsSettings($campaignId)
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/bids/settings.json';
            $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
            $decodedResponseBody = $this->getDecodedBody($response->getBody());
            $getBidsSettingsResponse = new BidsSettingsResponse($decodedResponseBody);

            return $getBidsSettingsResponse->getSettings();

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get bids settings
     *
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/post-campaigns-id-auction-recommendations-bids-search-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param array $getParams
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getRecommendationsBidsForYandexSearch($campaignId, array $params = [], array $getParams = [])
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/recommendations/bids.json';
            $resource .= '?' . $this->buildQueryString($getParams);
            $response = $this->sendRequest(
                'POST',
                $this->getServiceUrl($resource),
                ['json' => $params]
            );
            $decodedResponseBody = $this->getDecodedBody($response->getBody());

            return new GetRecommendedBidsResponse($decodedResponseBody);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Set recommended bids
     *
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/put-campaigns-id-auction-recommendations-bids-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param array $getParams
     * @return string|SetBidsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setRecommendationsBids($campaignId, array $params = [], array $getParams = [])
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/recommendations/bids.json';
            $resource .= '?' . $this->buildQueryString($getParams);
            $response = $this->sendRequest(
                'PUT',
                $this->getServiceUrl($resource),
                ['json' => $params]
            );
            $decodedResponseBody = $this->getDecodedBody($response->getBody());

            return new SetBidsResponse($decodedResponseBody);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
