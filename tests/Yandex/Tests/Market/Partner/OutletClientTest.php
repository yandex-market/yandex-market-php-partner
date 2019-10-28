<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\OutletClient;
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
class OutletClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    function testGetOutletInfo()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/outlet.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OutletClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $outlet = $mock->getOutletInfo(2222, 111);

        $this->assertEquals(
            $jsonObj->coords,
            $outlet->getCoords()
        );
        $this->assertEquals(
            $jsonObj->id,
            $outlet->getId()
        );
        $this->assertEquals(
            $jsonObj->isMain,
            $outlet->getIsMain()
        );
        $this->assertEquals(
            $jsonObj->name,
            $outlet->getName()
        );
        $this->assertEquals(
            $jsonObj->shopOutletCode,
            $outlet->getShopOutletCode()
        );
        $this->assertEquals(
            $jsonObj->status,
            $outlet->getStatus()
        );
        $this->assertEquals(
            $jsonObj->type,
            $outlet->getType()
        );
        $this->assertEquals(
            $jsonObj->visibility,
            $outlet->getVisibility()
        );
        $this->assertEquals(
            $jsonObj->address->regionId,
            $outlet->getAddress()->getRegionId()
        );
        $this->assertEquals(
            $jsonObj->address->street,
            $outlet->getAddress()->getStreet()
        );
        $this->assertEquals(
            $jsonObj->address->number,
            $outlet->getAddress()->getNumber()
        );

        $deliveryRules = $outlet->getDeliveryRules();
        $deliveryRulesCount = $deliveryRules->count();
        $deliveryRule = $deliveryRules->current();

        for ($i = 0; $i < $deliveryRulesCount; $i++) {
            $this->assertEquals(
                $jsonObj->deliveryRules[$i]->cost,
                $deliveryRule->getCost()
            );
            $this->assertEquals(
                $jsonObj->deliveryRules[$i]->deliveryServiceId,
                $deliveryRule->getDeliveryServiceId()
            );
            $this->assertEquals(
                $jsonObj->deliveryRules[$i]->maxDeliveryDays,
                $deliveryRule->getMaxDeliveryDays()
            );
            $this->assertEquals(
                $jsonObj->deliveryRules[$i]->minDeliveryDays,
                $deliveryRule->getMinDeliveryDays()
            );
            $this->assertEquals(
                $jsonObj->deliveryRules[$i]->orderBefore,
                $deliveryRule->getOrderBefore()
            );
            $this->assertEquals(
                $jsonObj->deliveryRules[$i]->priceFreePickup,
                $deliveryRule->getPriceFreePickup()
            );
            $this->assertEquals(
                $jsonObj->deliveryRules[$i]->unspecifiedDeliveryInterval,
                $deliveryRule->getUnspecifiedDeliveryInterval()
            );

            $deliveryRule = $deliveryRules->next();
        }

        $this->assertEquals(
            $jsonObj->emails[0],
            $outlet->getEmails()[0]
        );
        $this->assertEquals(
            $jsonObj->phones[0],
            $outlet->getPhones()[0]
        );

        $region = $outlet->getRegion();

        $this->assertEquals(
            $jsonObj->region->id,
            $region->getId()
        );
        $this->assertEquals(
            $jsonObj->region->type,
            $region->getType()
        );
        $this->assertEquals(
            $jsonObj->region->name,
            $region->getName()
        );


        $this->assertEquals(
            $jsonObj->region->parent->id,
            $region->getParent()->getId()
        );
        $this->assertEquals(
            $jsonObj->region->parent->name,
            $region->getParent()->getName()
        );
        $this->assertEquals(
            $jsonObj->region->parent->type,
            $region->getParent()->getType()
        );


        $this->assertEquals(
            $jsonObj->region->parent->parent->id,
            $region->getParent()->getParent()->getId()
        );
        $this->assertEquals(
            $jsonObj->region->parent->parent->name,
            $region->getParent()->getParent()->getName()
        );
        $this->assertEquals(
            $jsonObj->region->parent->parent->type,
            $region->getParent()->getParent()->getType()
        );

        $this->assertEquals(
            $jsonObj->region->parent->parent->parent->id,
            $region->getParent()->getParent()->getParent()->getId()
        );
        $this->assertEquals(
            $jsonObj->region->parent->parent->parent->name,
            $region->getParent()->getParent()->getParent()->getName()
        );
        $this->assertEquals(
            $jsonObj->region->parent->parent->parent->type,
            $region->getParent()->getParent()->getParent()->getType()
        );

        $schedule = $outlet->getWorkingSchedule();

        $this->assertEquals(
            $jsonObj->workingSchedule->workInHoliday,
            $schedule->getWorkInHoliday()
        );

        $scheduleItems = $schedule->getScheduleItems();
        $scheduleItemsCount = $scheduleItems->count();
        $scheduleItem = $scheduleItems->current();

        for ($i = 0; $i < $scheduleItemsCount; $i++) {
            $this->assertEquals(
                $jsonObj->workingSchedule->scheduleItems[$i]->endDay,
                $scheduleItem->getEndDay()
            );
            $this->assertEquals(
                $jsonObj->workingSchedule->scheduleItems[$i]->endTime,
                $scheduleItem->getEndTime()
            );
            $this->assertEquals(
                $jsonObj->workingSchedule->scheduleItems[$i]->startDay,
                $scheduleItem->getStartDay()
            );
            $this->assertEquals(
                $jsonObj->workingSchedule->scheduleItems[$i]->startTime,
                $scheduleItem->getStartTime()
            );

            $scheduleItem = $scheduleItems->next();
        }

    }

    public function testGetOutletsInfo()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/outlets.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OutletClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $outletResponse = $mock->getOutletsInfo(2222);

        $outlets = $outletResponse->getOutlets();
        $outletsCount = $outlets->count();
        $outlet = $outlets->current();

        for ($y = 0; $y < $outletsCount; $y++) {
            $this->assertEquals(
                $jsonObj->outlets[$y]->coords,
                $outlet->getCoords()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->id,
                $outlet->getId()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->isMain,
                $outlet->getIsMain()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->name,
                $outlet->getName()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->shopOutletCode,
                $outlet->getShopOutletCode()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->status,
                $outlet->getStatus()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->type,
                $outlet->getType()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->visibility,
                $outlet->getVisibility()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->address->regionId,
                $outlet->getAddress()->getRegionId()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->address->street,
                $outlet->getAddress()->getStreet()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->address->number,
                $outlet->getAddress()->getNumber()
            );

            $deliveryRules = $outlet->getDeliveryRules();
            $deliveryRulesCount = $deliveryRules->count();
            $deliveryRule = $deliveryRules->current();

            for ($i = 0; $i < $deliveryRulesCount; $i++) {
                $this->assertEquals(
                    $jsonObj->outlets[$y]->deliveryRules[$i]->cost,
                    $deliveryRule->getCost()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->deliveryRules[$i]->deliveryServiceId,
                    $deliveryRule->getDeliveryServiceId()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->deliveryRules[$i]->maxDeliveryDays,
                    $deliveryRule->getMaxDeliveryDays()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->deliveryRules[$i]->minDeliveryDays,
                    $deliveryRule->getMinDeliveryDays()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->deliveryRules[$i]->orderBefore,
                    $deliveryRule->getOrderBefore()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->deliveryRules[$i]->priceFreePickup,
                    $deliveryRule->getPriceFreePickup()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->deliveryRules[$i]->unspecifiedDeliveryInterval,
                    $deliveryRule->getUnspecifiedDeliveryInterval()
                );

                $deliveryRule = $deliveryRules->next();
            }

            $this->assertEquals(
                $jsonObj->outlets[$y]->emails[0],
                $outlet->getEmails()[0]
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->phones[0],
                $outlet->getPhones()[0]
            );

            $region = $outlet->getRegion();

            $this->assertEquals(
                $jsonObj->outlets[$y]->region->id,
                $region->getId()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->region->type,
                $region->getType()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->region->name,
                $region->getName()
            );


            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->id,
                $region->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->name,
                $region->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->type,
                $region->getParent()->getType()
            );


            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->parent->id,
                $region->getParent()->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->parent->name,
                $region->getParent()->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->parent->type,
                $region->getParent()->getParent()->getType()
            );

            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->parent->parent->id,
                $region->getParent()->getParent()->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->parent->parent->name,
                $region->getParent()->getParent()->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->outlets[$y]->region->parent->parent->parent->type,
                $region->getParent()->getParent()->getParent()->getType()
            );

            $schedule = $outlet->getWorkingSchedule();

            $this->assertEquals(
                $jsonObj->outlets[$y]->workingSchedule->workInHoliday,
                $schedule->getWorkInHoliday()
            );

            $scheduleItems = $schedule->getScheduleItems();
            $scheduleItemsCount = $scheduleItems->count();
            $scheduleItem = $scheduleItems->current();

            for ($i = 0; $i < $scheduleItemsCount; $i++) {
                $this->assertEquals(
                    $jsonObj->outlets[$y]->workingSchedule->scheduleItems[$i]->endDay,
                    $scheduleItem->getEndDay()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->workingSchedule->scheduleItems[$i]->endTime,
                    $scheduleItem->getEndTime()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->workingSchedule->scheduleItems[$i]->startDay,
                    $scheduleItem->getStartDay()
                );
                $this->assertEquals(
                    $jsonObj->outlets[$y]->workingSchedule->scheduleItems[$i]->startTime,
                    $scheduleItem->getStartTime()
                );

                $scheduleItem = $scheduleItems->next();
            }
            $outlet = $outlets->next();
        }
    }

    public function testDeleteOutlet()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OutletClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $response = $mock->deleteOutlet(2222, 1234);

        $response->getStatus();

        $this->assertEquals(
            $jsonObj->status,
            $response->getStatus()
        );
    }

    public function testUpdateOutlet()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OutletClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $response = $mock->updateOutlet(2222, 1234);

        $response->getStatus();

        $this->assertEquals(
            $jsonObj->status,
            $response->getStatus()
        );

    }

    public function testCreateOutlet()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OutletClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $response = $mock->createOutlet(2222, ['test' => true]);

        $this->assertEquals(
            $jsonObj->status,
            $response->getStatus()
        );
    }

    public function testGetOutletsLicenses()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getOutletsLicenses.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OutletClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $getOutletsLicenses = $mock->getOutletsLicenses(1111);
        $licenses = $getOutletsLicenses->getLicenses();
        $license = $licenses->current();
        $licensesCount = $licenses->count();

        for ($i = 0; $i < $licensesCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->licenses[$i]->id,
                $license->getId()
            );
            $this->assertEquals(
                $jsonObj->result->licenses[$i]->outletId,
                $license->getOutletId()
            );
            $this->assertEquals(
                $jsonObj->result->licenses[$i]->licenseType,
                $license->getLicenseType()
            );
            $this->assertEquals(
                $jsonObj->result->licenses[$i]->number,
                $license->getNumber()
            );
            $this->assertEquals(
                $jsonObj->result->licenses[$i]->dateOfIssue,
                $license->getDateOfIssue()
            );
            $this->assertEquals(
                $jsonObj->result->licenses[$i]->dateOfExpiry,
                $license->getDateOfExpiry()
            );
            $this->assertEquals(
                $jsonObj->result->licenses[$i]->checkStatus,
                $license->getCheckStatus()
            );

            $license = $licenses->next();
        }
    }
}