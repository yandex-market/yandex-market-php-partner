<?php

namespace Yandex\Tests\Beru\Partner;

use GuzzleHttp\Psr7\Response;
use Yandex\Tests\TestCase;
use Yandex\Beru\Partner\Clients\OrderProcessingClient;

class OrderProcessingClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    const CAMPAIGN_ID = 123456;
    const ORDER_ID = 1245;
    const SHIPMENT_ID = 4579;

    public function testUpdateOrderStatus()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/updateOrderStatus.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $order = $mock->updateOrderStatus(self::CAMPAIGN_ID, self::ORDER_ID);

        $this->assertEquals(
            $jsonObj->order->creationDate,
            $order->getCreationDate()
        );
        $this->assertEquals(
            $jsonObj->order->currency,
            $order->getCurrency()
        );
        $this->assertEquals(
            $jsonObj->order->fake,
            $order->getFake()
        );
        $this->assertEquals(
            $jsonObj->order->id,
            $order->getId()
        );
        $this->assertEquals(
            $jsonObj->order->itemsTotal,
            $order->getItemsTotal()
        );
        $this->assertEquals(
            $jsonObj->order->paymentType,
            $order->getPaymentType()
        );
        $this->assertEquals(
            $jsonObj->order->paymentMethod,
            $order->getPaymentMethod()
        );
        $this->assertEquals(
            $jsonObj->order->status,
            $order->getStatus()
        );
        $this->assertEquals(
            $jsonObj->order->taxSystem,
            $order->getTaxSystem()
        );
        $this->assertEquals(
            $jsonObj->order->total,
            $order->getTotal()
        );
    }

    public function testGetOrder()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getOrder.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $order = $mock->getOrder(self::CAMPAIGN_ID, self::ORDER_ID);

        $this->assertEquals(
            $jsonObj->order->creationDate,
            $order->getCreationDate()
        );
        $this->assertEquals(
            $jsonObj->order->currency,
            $order->getCurrency()
        );
        $this->assertEquals(
            $jsonObj->order->fake,
            $order->getFake()
        );
        $this->assertEquals(
            $jsonObj->order->id,
            $order->getId()
        );
        $this->assertEquals(
            $jsonObj->order->itemsTotal,
            $order->getItemsTotal()
        );
        $this->assertEquals(
            $jsonObj->order->paymentType,
            $order->getPaymentType()
        );
        $this->assertEquals(
            $jsonObj->order->paymentMethod,
            $order->getPaymentMethod()
        );
        $this->assertEquals(
            $jsonObj->order->status,
            $order->getStatus()
        );
        $this->assertEquals(
            $jsonObj->order->taxSystem,
            $order->getTaxSystem()
        );
        $this->assertEquals(
            $jsonObj->order->total,
            $order->getTotal()
        );
        $delivery = $order->getDelivery();
        $this->assertEquals(
            $jsonObj->order->delivery->deliveryPartnerType,
            $delivery->getDeliveryPartnerType()
        );
        $this->assertEquals(
            $jsonObj->order->delivery->serviceName,
            $delivery->getServiceName()
        );
        $this->assertEquals(
            $jsonObj->order->delivery->type,
            $delivery->getType()
        );
        $region = $delivery->getRegion();
        $this->assertEquals(
            $jsonObj->order->delivery->region->id,
            $region->getId()
        );
        $this->assertEquals(
            $jsonObj->order->delivery->region->name,
            $region->getName()
        );
        $this->assertEquals(
            $jsonObj->order->delivery->region->type,
            $region->getType()
        );
        $parent = $region->getParent();
        $this->assertEquals(
            $jsonObj->order->delivery->region->parent->id,
            $parent->getId()
        );
        $shipments = $delivery->getShipments();
        $shipment = $shipments->current();
        for ($i = 0; $i < $shipments->count(); $i++) {
            $this->assertEquals(
                $jsonObj->order->delivery->shipments[$i]->id,
                $shipment->getId()
            );
            $this->assertEquals(
                $jsonObj->order->delivery->shipments[$i]->depth,
                $shipment->getDepth()
            );
            $this->assertEquals(
                $jsonObj->order->delivery->shipments[$i]->height,
                $shipment->getHeight()
            );
            $this->assertEquals(
                $jsonObj->order->delivery->shipments[$i]->weight,
                $shipment->getWeight()
            );
            $this->assertEquals(
                $jsonObj->order->delivery->shipments[$i]->width,
                $shipment->getWidth()
            );
            $items = $shipment->getItems();
            $item = $items->current();
            for ($y = 0; $y < $items->count(); $y++) {
                $this->assertEquals(
                    $jsonObj->order->delivery->shipments[$i]->items[$y]->count,
                    $item->getCount()
                );
                $this->assertEquals(
                    $jsonObj->order->delivery->shipments[$i]->items[$y]->id,
                    $item->getId()
                );
                $item = $items->next();
            }

            $shipment = $shipments->next();
        }
        $items = $order->getItems();
        $item = $items->current();
        for ($i = 0; $i < $items->count(); $i++) {
            $this->assertEquals(
                $jsonObj->order->items[$i]->id,
                $item->getId()
            );
            $this->assertEquals(
                $jsonObj->order->items[$i]->offerId,
                $item->getOfferId()
            );
            $this->assertEquals(
                $jsonObj->order->items[$i]->count,
                $item->getCount()
            );
            $this->assertEquals(
                $jsonObj->order->items[$i]->price,
                $item->getPrice()
            );
            $this->assertEquals(
                $jsonObj->order->items[$i]->vat,
                $item->getVat()
            );
            $promos = $item->getPromos();
            if ($promos) {
                $promo = $promos->current();
                for ($j = 0; $j < $promos->count(); $j++) {
                    $this->assertEquals(
                        $jsonObj->order->items[$i]->promos[$j]->marketPromoId,
                        $promo->getMarketPromoId()
                    );
                    $this->assertEquals(
                        $jsonObj->order->items[$i]->promos[$j]->subsidy,
                        $promo->getSubsidy()
                    );
                    $this->assertEquals(
                        $jsonObj->order->items[$i]->promos[$j]->type,
                        $promo->getType()
                    );
                    $promo = $promos->next();
                }
            }
            $item = $items->next();
        }
    }

    public function testGetOrders()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getOrders.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $orderProcessingResponse = $mock->getOrders(self::CAMPAIGN_ID);
        $orders = $orderProcessingResponse->getOrders();
        $pager = $orderProcessingResponse->getPager();

        $this->assertEquals(
            $jsonObj->pager->currentPage,
            $pager->getCurrentPage()
        );
        $this->assertEquals(
            $jsonObj->pager->from,
            $pager->getFrom()
        );
        $this->assertEquals(
            $jsonObj->pager->pagesCount,
            $pager->getPagesCount()
        );
        $this->assertEquals(
            $jsonObj->pager->pageSize,
            $pager->getPageSize()
        );
        $this->assertEquals(
            $jsonObj->pager->to,
            $pager->getTo()
        );
        $this->assertEquals(
            $jsonObj->pager->total,
            $pager->getTotal()
        );

        $order = $orders->current();
        for ($i = 0; $i < $orders->count(); $i++) {
            $this->assertEquals(
                $jsonObj->orders[$i]->creationDate,
                $order->getCreationDate()
            );
            $this->assertEquals(
                $jsonObj->orders[$i]->currency,
                $order->getCurrency()
            );
            $this->assertEquals(
                $jsonObj->orders[$i]->fake,
                $order->getFake()
            );
            $this->assertEquals(
                $jsonObj->orders[$i]->id,
                $order->getId()
            );
            $this->assertEquals(
                $jsonObj->orders[$i]->itemsTotal,
                $order->getItemsTotal()
            );
            $this->assertEquals(
                $jsonObj->orders[$i]->paymentType,
                $order->getPaymentType()
            );
            $this->assertEquals(
                $jsonObj->orders[$i]->paymentMethod,
                $order->getPaymentMethod()
            );
            $this->assertEquals(
                $jsonObj->orders[$i]->status,
                $order->getStatus()
            );
            $this->assertEquals(
                $jsonObj->orders[$i]->total,
                $order->getTotal()
            );
            $order = $orders->next();
        }
    }


    public function testPutInfoOrderBoxes()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/putInfoOrderBoxes.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $boxes = $mock->putInfoOrderBoxes(self::CAMPAIGN_ID, self::ORDER_ID, self::SHIPMENT_ID);

        $box = $boxes->current();

        for ($i = 0; $i < $boxes->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->boxes[$i]->id,
                $box->getId()
            );
            $this->assertEquals(
                $jsonObj->result->boxes[$i]->weight,
                $box->getWeight()
            );
            $this->assertEquals(
                $jsonObj->result->boxes[$i]->height,
                $box->getHeight()
            );
            $this->assertEquals(
                $jsonObj->result->boxes[$i]->depth,
                $box->getDepth()
            );

            $box = $boxes->next();
        }
    }

    public function testGetDeliveryService()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getDeliveryServices.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $orderProcessingResponse = $mock->getDeliveryService(self::CAMPAIGN_ID, self::ORDER_ID);

        $deliveryService = $orderProcessingResponse->current();

        for ($i = 0; $i < $orderProcessingResponse->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->deliveryService[$i]->id,
                $deliveryService->getId()
            );

            $this->assertEquals(
                $jsonObj->result->deliveryService[$i]->name,
                $deliveryService->getName()
            );
            $deliveryService = $orderProcessingResponse->next();
        }
    }
}
