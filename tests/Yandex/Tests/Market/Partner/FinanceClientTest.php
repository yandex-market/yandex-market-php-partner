<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\FinanceClient;
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
class FinanceClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    function testGetBalance()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/balance.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(FinanceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $balance = $mock->getBalance(2222);

        $this->assertEquals(
            $jsonObj->balance->balance,
            $balance->getBalance()
        );
        $this->assertEquals(
            $jsonObj->balance->daysLeft,
            $balance->getDaysLeft()
        );
        $this->assertEquals(
            $jsonObj->balance->recommendedPayment,
            $balance->getRecommendedPayment()
        );
    }
}