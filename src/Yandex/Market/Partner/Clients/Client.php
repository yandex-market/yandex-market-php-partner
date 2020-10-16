<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use GuzzleHttp\Exception\ClientException;
use Yandex\Common\AbstractServiceClient;
use Yandex\Common\Exception\ForbiddenException;
use Yandex\Common\Exception\UnauthorizedException;
use Yandex\Market\Partner\Exception\PartnerRequestException;

class Client extends AbstractServiceClient
{
    /**
     * API domain
     *
     * @var string
     */
    protected $serviceDomain = 'api.partner.market.yandex.ru';

    /**
     * Requested version of API
     *
     * @var string
     */
    private $version = 'v2';

    /**
     * Application ID
     *
     * @var string
     */
    private $clientId;

    /**
     * Headers for API
     *
     * @var array
     */
    private $headers = [
        'Yandex-Market-Php-Version' => 'yandex.market php library 1.1.0'
    ];


    /**
     * @param string $token access token
     */
    public function __construct($clientId = '', $token = '')
    {
        $this->setAccessToken($token);
        $this->setClientId($clientId);
    }

    /**
     * Get url to service resource with parameters
     *
     * @param string $resource
     *
     * @see http://api.yandex.ru/market/partner/doc/dg/concepts/method-call.xml
     * @return string
     */
    public function getServiceUrl($resource = '')
    {
        return $this->serviceScheme . '://' . $this->serviceDomain . '/' . $this->version . '/' . $resource;
    }

    /**
     * Get OAuth data for header request
     *
     * @see http://api.yandex.ru/market/partner/doc/dg/concepts/authorization.xml
     *
     * @return string
     */
    public function getAccessToken()
    {
        return 'oauth_token=' . parent::getAccessToken() . ', oauth_client_id=' . $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * Returns URL-encoded query string
     *
     * @note: similar to http_build_query(),
     * but transform key=>value where key == value to "?key" param.
     *
     * @param array|object $queryData
     * @param null $dbgKey
     * @param string $prefix
     * @param string $argSeparator
     * @param int $encType
     *
     * @return string $queryString
     */
    protected function buildQueryString(
        array $queryData,
        $dbgKey = null,
        $prefix = '',
        $argSeparator = '&',
        $encType = PHP_QUERY_RFC3986
    ) {
        foreach ($queryData as $key => &$value) {
            if (!is_scalar($value)) {
                $value = implode(',', $value);
            }
        }

        $queryString = http_build_query($queryData, $prefix, $argSeparator, $encType);

        foreach ($queryData as $key => $value) {
            if ($key === $value) {
                $queryString = str_replace("{$key}={$value}", $value, $queryString);
            }
        }
        if ($dbgKey) {
            $queryString ? $queryString .= '&dbg=' . $dbgKey : $queryString .= 'dbg=' . $dbgKey;
        }

        return $queryString;
    }

    /**
     * Sends a request
     *
     * @param string $method  HTTP method
     * @param string $uri     URI object or string.
     * @param array  $options Request options to apply.
     *
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function sendRequest($method, $uri, array $options = [])
    {
        try {
            $response = $this->getClient($this->headers)->request($method, $uri, $options);
        } catch (ClientException $ex) {
            $result = $ex->getResponse();

            $code = $result->getStatusCode();
            $message = $result->getReasonPhrase();
            $body = $result->getBody();

            if ($body) {
                $jsonBody = json_decode($body);
                if ($jsonBody && isset($jsonBody->error) && isset($jsonBody->error->message)) {
                    $message = $jsonBody->error->message;
                }
            }

            if ($code === 403) {
                throw new ForbiddenException($message);
            }

            if ($code === 401) {
                throw new UnauthorizedException($message);
            }

            throw new PartnerRequestException(
                'Service responded with error code: "' . $code . '" and message: "' . $message . '"',
                $code
            );
        }

        return $response;
    }

    protected function addDebugKey($resource, $dbgKey)
    {
        if($dbgKey) {
            return $resource . '?dbg=' . $dbgKey;
        }
        return $resource;
    }
}
