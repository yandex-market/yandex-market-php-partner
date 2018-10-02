<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\GeobaseClient;
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
class GeobaseClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    public function testGetRegion()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/region.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(GeobaseClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $regions = $mock->getRegion(2222);
        $regionsCount = $regions->count();

        $region = $regions->current();

        for ($i = 0; $i < $regionsCount; $i++) {
            $this->assertEquals(
                $jsonObj->regions[$i]->id,
                $region->getId()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->type,
                $region->getType()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->name,
                $region->getName()
            );


            $this->assertEquals(
                $jsonObj->regions[$i]->parent->id,
                $region->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->name,
                $region->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->type,
                $region->getParent()->getType()
            );


            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->id,
                $region->getParent()->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->name,
                $region->getParent()->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->type,
                $region->getParent()->getParent()->getType()
            );

            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->parent->id,
                $region->getParent()->getParent()->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->parent->name,
                $region->getParent()->getParent()->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->parent->type,
                $region->getParent()->getParent()->getParent()->getType()
            );

            $region = $regions->next();
        }
    }

    public function testGetRegionsMatch()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/region.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(GeobaseClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $regions = $mock->getRegionsMatch(['name' => 'Ивановка']);
        $regionsCount = $regions->count();

        $region = $regions->current();

        for ($i = 0; $i < $regionsCount; $i++) {
            $this->assertEquals(
                $jsonObj->regions[$i]->id,
                $region->getId()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->type,
                $region->getType()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->name,
                $region->getName()
            );


            $this->assertEquals(
                $jsonObj->regions[$i]->parent->id,
                $region->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->name,
                $region->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->type,
                $region->getParent()->getType()
            );


            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->id,
                $region->getParent()->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->name,
                $region->getParent()->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->type,
                $region->getParent()->getParent()->getType()
            );

            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->parent->id,
                $region->getParent()->getParent()->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->parent->name,
                $region->getParent()->getParent()->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->regions[$i]->parent->parent->parent->type,
                $region->getParent()->getParent()->getParent()->getType()
            );

            $region = $regions->next();
        }
    }

    public function testGetRegionChilds()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/regionChildren.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(GeobaseClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $regionsResponse = $mock->getRegionChilds(1);
        $region = $regionsResponse->getRegion();

            $this->assertEquals(
                $jsonObj->regions->id,
                $region->getId()
            );
            $this->assertEquals(
                $jsonObj->regions->type,
                $region->getType()
            );
            $this->assertEquals(
                $jsonObj->regions->name,
                $region->getName()
            );


            $this->assertEquals(
                $jsonObj->regions->parent->id,
                $region->getParent()->getId()
            );
            $this->assertEquals(
                $jsonObj->regions->parent->name,
                $region->getParent()->getName()
            );
            $this->assertEquals(
                $jsonObj->regions->parent->type,
                $region->getParent()->getType()
            );


            $childs = $region->getChildren();
            $childsCount = $childs->count();
            $child = $childs->current();

            for ($y = 0; $y < $childsCount; $y++) {
                $this->assertEquals(
                    $jsonObj->regions->children[$y]->id,
                    $child->getId()
                );
                $this->assertEquals(
                    $jsonObj->regions->children[$y]->name,
                    $child->getName()
                );
                $this->assertEquals(
                    $jsonObj->regions->children[$y]->type,
                    $child->getType()
                );
                $child = $childs->next();
            }
    }
}