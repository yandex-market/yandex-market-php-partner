<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\CampaignRegionClient;
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
class CampaignRegionClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    function testGetCampaigns()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/campaignRegion.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(CampaignRegionClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $region = $mock->getRegion(2222);

        $this->assertEquals(
            $jsonObj->region->id,
            $region->getId()
        );

        $this->assertEquals(
            $jsonObj->region->name,
            $region->getName()
        );

        $this->assertEquals(
            $jsonObj->region->type,
            $region->getType()
        );

        $this->assertEquals(
            $jsonObj->region->parent->id,
            $region->getParent()->getId()
        );
    }
}