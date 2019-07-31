<?php

namespace Yandex\Tests\Beru\Partner;

use Yandex\Beru\Partner\Clients\OrderProcessingBeruClient;
use Yandex\Tests\TestCase;

class OrderProcessingBeruClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    public function testGetCart()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getCart.json');
        $jsonObj = json_decode($json);

        $orderProcessingBeruClient = new OrderProcessingBeruClient();
        $cart = $orderProcessingBeruClient->getCart($json);

        $this->assertEquals(
            $jsonObj->cart->currency,
            $cart->getCurrency()
        );

        $delivery = $cart->getDelivery();
        $region = $delivery->getRegion();
        $this->assertEquals(
            $jsonObj->cart->delivery->region->id,
            $region->getId()
        );
        $this->assertEquals(
            $jsonObj->cart->delivery->region->name,
            $region->getName()
        );
        $this->assertEquals(
            $jsonObj->cart->delivery->region->type,
            $region->getType()
        );
        $items = $cart->getItems();
        $item = $items->current();

        for ($i = 0; $i < $items->count(); $i++ ) {
            $this->assertEquals(
                $jsonObj->cart->items[$i]->offerId,
                $item->getOfferId()
            );
            $this->assertEquals(
                $jsonObj->cart->items[$i]->count,
                $item->getCount()
            );
            $item = $items->next();
        }
    }

    public function testGetAcceptOrder()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/acceptOrder.json');
        $jsonObj = json_decode($json);
        $orderProcessingBeruClient = new OrderProcessingBeruClient();

        $order = $orderProcessingBeruClient->acceptOrder($json);

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
            $jsonObj->order->paymentType,
            $order->getPaymentType()
        );
        $this->assertEquals(
            $jsonObj->order->paymentMethod,
            $order->getPaymentMethod()
        );
        $this->assertEquals(
            $jsonObj->order->taxSystem,
            $order->getTaxSystem()
        );
        $items = $order->getItems();
        $item = $items->current();

        for ($i = 0; $i < $items->count(); $i++ ) {
            $this->assertEquals(
                $jsonObj->order->items[$i]->offerId,
                $item->getOfferId()
            );
            $this->assertEquals(
                $jsonObj->order->items[$i]->count,
                $item->getCount()
            );
            $item = $items->next();
        }
    }

    public function testOrderStatus()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/orderStatus.json');
        $jsonObj = json_decode($json);
        $orderProcessingBeruClient = new OrderProcessingBeruClient();

        $cartResp = $orderProcessingBeruClient->orderStatus($json);
        $order = $cartResp->getOrder();

        $this->assertEquals(
            $jsonObj->order->fake,
            $order->getFake()
        );
        $this->assertEquals(
            $jsonObj->order->id,
            $order->getId()
        );
        $this->assertEquals(
            $jsonObj->order->paymentType,
            $order->getPaymentType()
        );
        $this->assertEquals(
            $jsonObj->order->taxSystem,
            $order->getTaxSystem()
        );
        $this->assertEquals(
            $jsonObj->order->substatus,
            $order->getSubstatus()
        );
        $this->assertEquals(
            $jsonObj->order->total,
            $order->getTotal()
        );
        $this->assertEquals(
            $jsonObj->order->itemsTotal,
            $order->getItemsTotal()
        );
    }
}
