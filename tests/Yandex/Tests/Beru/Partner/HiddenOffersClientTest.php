<?php

namespace Yandex\Tests\Beru\Partner;

use GuzzleHttp\Psr7\Response;
use Yandex\Tests\TestCase;
use Yandex\Beru\Partner\Clients\HiddenOffersClient;

class HiddenOffersClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';
    const CAMPAIGN_ID = 123456;

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

        $offersResp = $mock->getInfo(self::CAMPAIGN_ID);

        $nextPageToken = $offersResp->getNextPageToken();
        $total = $offersResp->getTotal();
        $offers = $offersResp->getHiddenOffers();
        $offer = $offers->current();

        $this->assertEquals($jsonObj->result->paging->nextPageToken, $nextPageToken);
        $this->assertEquals($jsonObj->result->total, $total);

        for ($i = 0; $i < $offers->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->hiddenOffers[$i]->comment,
                $offer->getComment()
            );
            $this->assertEquals(
                $jsonObj->result->hiddenOffers[$i]->marketSku,
                $offer->getMarkerSku()
            );
            $this->assertEquals(
                $jsonObj->result->hiddenOffers[$i]->ttlInHours,
                $offer->getTtlInHours()
            );
            $offer = $offers->next();
        }
    }

    public function testHideOffers()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));
        $mock = $this->getMockBuilder(HiddenOffersClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $offersResp = $mock->hideOffers(self::CAMPAIGN_ID);
        $status = $offersResp->getStatus();

        $this->assertEquals($jsonObj->status, $status);
    }

    public function testShowOffers()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));
        $mock = $this->getMockBuilder(HiddenOffersClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $offersResp = $mock->showOffers(self::CAMPAIGN_ID);
        $status = $offersResp->getStatus();

        $this->assertEquals($jsonObj->status, $status);
    }
}