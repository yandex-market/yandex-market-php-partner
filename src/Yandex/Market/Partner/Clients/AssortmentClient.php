<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Categories;
use Yandex\Market\Partner\Models\Feed;
use Yandex\Market\Partner\Models\Feeds;
use Yandex\Market\Partner\Models\Offers;
use Yandex\Market\Partner\Models\Response\GetAllOffersResponse;
use Yandex\Market\Partner\Models\Response\GetCampaignCategoriesResponse;
use Yandex\Market\Partner\Models\Response\GetFeedCategoriesResponse;
use Yandex\Market\Partner\Models\Response\GetFeedResponse;
use Yandex\Market\Partner\Models\Response\GetFeedsResponse;
use Yandex\Market\Partner\Models\Response\GetIndexLogsResponse;
use Yandex\Market\Partner\Models\Response\GetOffersResponse;
use Yandex\Market\Partner\Models\Response\PostResponse;

class AssortmentClient extends Client
{
    /* GET */

    /**
     * Get Campaign Offers
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-offers-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return GetOffersResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getOffers($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/offers.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOffersResponse($decodedResponseBody);
    }

    /**
     * Get All Campaign Offers
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-offers-all-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return \Yandex\Market\Partner\Models\Offers
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getAllOffers($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/offers/all.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getAllOffersResponse = new GetAllOffersResponse($decodedResponseBody);

        return $getAllOffersResponse->getOffers();
    }

    /**
     * Get Campaign Feeds
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-docpage/
     *
     * @return \Yandex\Market\Partner\Models\Feeds
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFeeds($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feeds.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getFeedsResponse = new GetFeedsResponse($decodedResponseBody);

        return $getFeedsResponse->getFeeds();
    }

    /**
     * Get Feed
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-id-docpage/
     *
     * @param $campaignId
     * @param $feedId
     * @param array $params
     * @param null $dbgKey
     * @return \Yandex\Market\Partner\Models\Feed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getFeed($campaignId, $feedId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feeds/' . $feedId . '.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getFeedResponse = new GetFeedResponse($decodedResponseBody);

        return $getFeedResponse->getFeed();
    }

    /**
     * Get Feed categories
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-id-categories-docpage/
     *
     * @param $campaignId
     * @param $feedId
     * @param array $params
     * @param null $dbgKey
     * @return \Yandex\Market\Partner\Models\Categories
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @deprecated
     */
    public function getFeedCategories($campaignId, $feedId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feeds/' . $feedId . '/categories.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getFeedCategoriesResponse = new GetFeedCategoriesResponse($decodedResponseBody);

        return $getFeedCategoriesResponse->getCategories();
    }

    /**
     * Get Campaign categories
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-categories-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return \Yandex\Market\Partner\Models\Response\GetCampaignCategoriesResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getCampaignCategories($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feeds/categories.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetCampaignCategoriesResponse($decodedResponseBody);
    }

    /**
     * Get index logs by campaign
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-id-index-logs-docpage/
     *
     * @param $campaignId
     * @param $feedId
     * @param array $params
     * @param null $dbgKey
     * @return GetIndexLogsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getIndexLogs($campaignId, $feedId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feeds/' . $feedId . '/index-logs.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetIndexLogsResponse($decodedResponseBody);
    }

    /* POST */

    /**
     * Set new params to campaign feed
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-feeds-id-params-docpage/
     *
     * @param $campaignId
     * @param $feedId
     * @param array $params
     * @param null $dbgKey
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function setFeedParams($campaignId, $feedId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feeds/' . $feedId . '/params.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }


    /**
     * Inform Yandex.Market that the price list has been updated
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-feeds-id-params-docpage/
     *
     * @param $campaignId
     * @param $feedId
     * @param null $dbgKey
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function refreshFeed($campaignId, $feedId, $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feeds/' . $feedId . '/refresh.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest('POST', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    public function getFeedCategoriesPaged($campaignId, $feedId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feeds/' . $feedId . '/categories.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetFeedCategoriesResponse($decodedResponseBody);
    }
}
