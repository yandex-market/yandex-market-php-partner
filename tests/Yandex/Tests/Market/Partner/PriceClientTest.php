<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\PriceClient;
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
class PriceClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    function testGetOfferPrices()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/prices.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(PriceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $pricesResponse = $mock->getOfferPrices(2222);

        $this->assertEquals(
            $jsonObj->status,
            $pricesResponse->getStatus()
        );


        $offers = $pricesResponse->getResult();
        $offersCount = $offers->count();
        $total = $offers->getTotal();
        $this->assertEquals(
            $jsonObj->result->total,
            $total
        );

        $offer = $offers->current();

        for ($i = 0; $i < $offersCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->offers[$i]->id,
                $offer->getId()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->feed->id,
                $offer->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->price->currencyId,
                $offer->getPrice()->getCurrencyId()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->price->value,
                $offer->getPrice()->getValue()
            );

            $this->assertEquals(
                $jsonObj->result->offers[$i]->updatedAt,
                $offer->getUpdatedAt()
            );
            $offer = $offers->next();
        }
    }

    public function testUpdatePrices()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(PriceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $response = $mock->updatePrices(2222, ['test' => true]);

        $response->getStatus();

        $this->assertEquals(
            $jsonObj->status,
            $response->getStatus()
        );

    }

    public function testDeletePrices()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(PriceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $response = $mock->deletePrices(2222);

        $response->getStatus();

        $this->assertEquals(
            $jsonObj->status,
            $response->getStatus()
        );

    }
}