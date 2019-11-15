<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\BidClient;
use Yandex\Market\Partner\Clients\HiddenOffersClient;
use Yandex\Tests\TestCase;

/**
 * PackageTest
 *
 * @category Yandex
 * @package  Tests
 *
 * @author   Kirill Litvinov <Kirill.Litvinov@nixsolutions.com>
 * @created  31.08.2018 15:31
 */
class HiddenOffersClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    public function testGetInfo()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/hiddenOffers.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(HiddenOffersClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $offersResp = $mock->getInfo(2222);

        $status = $offersResp->getStatus();
        $this->assertEquals(
            $jsonObj->status,
            $status
        );

        $offers = $offersResp->getHiddenOffers();
        $offer = $offers->current();
        $nextPageToken = $offers->getNextPageToken();
        $total = $offers->getTotal();

        $this->assertEquals(
            $jsonObj->result->paging->nextPageToken,
            $nextPageToken
        );
        $this->assertEquals(
            $jsonObj->result->total,
            $total
        );



        for ($i = 0; $i < $offers->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->hiddenOffers[$i]->comment,
                $offer->getComment()
            );
            $this->assertEquals(
                $jsonObj->result->hiddenOffers[$i]->feedId,
                $offer->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->result->hiddenOffers[$i]->offerId,
                $offer->getOfferId()
            );
            $this->assertEquals(
                $jsonObj->result->hiddenOffers[$i]->ttlInHours,
                $offer->getTtlInHours()
            );

            $offer = $offers->next();
        }
    }
}