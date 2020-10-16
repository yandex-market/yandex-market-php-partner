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
    public function getBids($campaignId, array $params = [], $dbgKey = null)
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/bids.json';
            $resource = $this->addDebugKey($resource, $dbgKey);
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
     * @param null $dbgKey
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendedBids($campaignId, array $params = [], array $getParams = [], $dbgKey = null)
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/recommendations/bids.json';
            $resource .= '?' . $this->buildQueryString($getParams, $dbgKey);
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
     * @param null $dbgKey
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getPopularRecommendedBidsMarketSearch($campaignId, array $params = [], $dbgKey = null)
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/bids/recommended/top/market-search.json';
            $resource = $this->addDebugKey($resource, $dbgKey);
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
     * @param null $dbgKey
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setBids($campaignId, array $params = [], $dbgKey = null)
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/bids.json';
            $resource = $this->addDebugKey($resource, $dbgKey);
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
     * @param $campaignId
     * @param null $dbgKey
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBidsSettings($campaignId, $dbgKey = null)
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/bids/settings.json';
            $resource = $this->addDebugKey($resource, $dbgKey);
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
     * @param null $dbgKey
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendationsBidsForYandexSearch($campaignId, array $params = [], array $getParams = [], $dbgKey = null)
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/recommendations/bids.json';
            $resource .= '?' . $this->buildQueryString($getParams, $dbgKey);
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
     * @param null $dbgKey
     * @return string|SetBidsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setRecommendationsBids($campaignId, array $params = [], array $getParams = [], $dbgKey = null)
    {
        try {
            $resource = 'campaigns/' . $campaignId . '/auction/recommendations/bids.json';
            $resource .= '?' . $this->buildQueryString($getParams, $dbgKey);
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
