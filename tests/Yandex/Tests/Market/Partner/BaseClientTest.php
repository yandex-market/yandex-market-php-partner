<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\BaseClient;
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
class BaseClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    function testGetCampaigns()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/campaigns.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BaseClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $campaignResponse = $mock->getCampaigns();
        $campaignCount = $campaignResponse->getPager()->getTotal();

        $campaigns = $campaignResponse->getCampaigns();
        $campaign = $campaigns->current();

        for ($i = 0; $i < $campaignCount; $i++) {
            $this->assertEquals(
                $jsonObj->campaigns[$i]->domain,
                $campaign->getDomain()
            );

            $this->assertEquals(
                $jsonObj->campaigns[$i]->id,
                $campaign->getId()
            );

            $this->assertEquals(
                $jsonObj->campaigns[$i]->state,
                $campaign->getState()
            );

            $campaign = $campaigns->next();
        }
    }

    function testGetCampaign()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/campaign.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BaseClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $campaign = $mock->getCampaign(2222);

        $this->assertEquals(
            $jsonObj->campaign->domain,
            $campaign->getDomain()
        );

        $this->assertEquals(
            $jsonObj->campaign->id,
            $campaign->getId()
        );

        $this->assertEquals(
            $jsonObj->campaign->state,
            $campaign->getState()
        );

        $this->assertEquals(
            $jsonObj->campaign->stateReasons,
            $campaign->getStateReasons()
        );
    }

    public function testGetCampaignLogins()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/campaignLogins.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BaseClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $logins = $mock->getCampaignLogins(2222);

        $this->assertEquals(
            $jsonObj->logins,
            $logins
        );
    }

    public function testGetCampaignsByLogin()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/campaignsByLogin.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BaseClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $campaigns = $mock->getCampaignsByLogin('nuf-nuf');
        $campaignsCount = $campaigns->count();

        $campaign = $campaigns->current();
        for ($i = 0; $i < $campaignsCount; $i++) {
            $this->assertEquals(
                $jsonObj->campaigns[$i]->stateReasons,
                $campaign->getStateReasons()
            );
            $this->assertEquals(
                $jsonObj->campaigns[$i]->id,
                $campaign->getId()
            );
            $this->assertEquals(
                $jsonObj->campaigns[$i]->state,
                $campaign->getState()
            );
            $this->assertEquals(
                $jsonObj->campaigns[$i]->domain,
                $campaign->getDomain()
            );
            $campaign = $campaigns->next();
        }
    }

    public function testGetCampaignSettings()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/campaignSettings.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BaseClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $settings = $mock->getCampaignSettings(2222);

        $this->assertEquals(
            $jsonObj->settings->countryRegion,
            $settings->getCountryRegion()
        );
        $this->assertEquals(
            $jsonObj->settings->isOnline,
            $settings->getisOnline()
        );
        $this->assertEquals(
            $jsonObj->settings->shopName,
            $settings->getShopName()
        );
        $this->assertEquals(
            $jsonObj->settings->showInContext,
            $settings->getShowInContext()
        );
        $this->assertEquals(
            $jsonObj->settings->showInPremium,
            $settings->getShowInPremium()
        );
        $this->assertEquals(
            $jsonObj->settings->showInSnippets,
            $settings->getShowInSnippets()
        );
        $this->assertEquals(
            $jsonObj->settings->useOpenStat,
            $settings->getUseOpenStat()
        );

        $this->assertEquals(
            $jsonObj->settings->localRegion->id,
            $settings->getLocalRegion()->getId()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->name,
            $settings->getLocalRegion()->getName()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->type,
            $settings->getLocalRegion()->getType()
        );

        $this->assertEquals(
            $jsonObj->settings->localRegion->delivery->schedule->availableOnHolidays,
            $settings->getLocalRegion()->getDelivery()->getAvailableOnHolidays()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->delivery->schedule->source,
            $settings->getLocalRegion()->getDelivery()->getSource()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->delivery->schedule->customHolidays,
            $settings->getLocalRegion()->getDelivery()->getCustomHolidays()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->delivery->schedule->customWorkingDays,
            $settings->getLocalRegion()->getDelivery()->getCustomWorkingDays()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->delivery->schedule->period->fromDate,
            $settings->getLocalRegion()->getDelivery()->getPeriod()->getFromDate()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->delivery->schedule->period->toDate,
            $settings->getLocalRegion()->getDelivery()->getPeriod()->getToDate()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->delivery->schedule->totalHolidays,
            $settings->getLocalRegion()->getDelivery()->getTotalHolidays()
        );
        $this->assertEquals(
            $jsonObj->settings->localRegion->delivery->schedule->weeklyHolidays,
            $settings->getLocalRegion()->getDelivery()->getWeeklyHolidays()
        );
    }
}