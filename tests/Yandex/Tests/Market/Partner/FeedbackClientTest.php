<?php

namespace Yandex\Tests\Market\Partner;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\FeedbackClient;
use Yandex\Tests\TestCase;

class FeedbackClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';
    protected $campaignId = 12345;

    public function testGetFeedback()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/feedback.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(FeedbackClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $getFeedback = $mock->getFeedback($this->campaignId);
        $status = $getFeedback->getStatus();

        $this->assertEquals($jsonObj->status, $status);

        $result = $getFeedback->getResult();
        $paging = $result->getNextPageToken();

        $this->assertEquals($jsonObj->result->paging->nextPageToken, $paging);

        $feedbackList = $result->getFeedbackList();

        $feedbackListCount = $feedbackList->count();
        $feedback = $feedbackList->current();

        for ($i = 0; $i < $feedbackListCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->id,
                $feedback->getId()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->createdAt,
                $feedback->getCreatedAt()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->state,
                $feedback->getState()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->recommend,
                $feedback->getRecommend()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->verified,
                $feedback->getVerified()
            );
            $author = $feedback->getAuthor();

            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->author->name,
                $author->getName()
            );
            $region = $author->getRegion();
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->author->region->id,
                $region->getId()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->author->region->name,
                $author->getRegion()->getName()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->author->region->type,
                $author->getRegion()->getType()
            );

            $shop = $feedback->getShop();

            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->shop->name,
                $shop->getName()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->recommend,
                $feedback->getRecommend()
            );
            $grades = $feedback->getGrades();
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->grades->average,
                $grades->getAverage()
            );
            $factors = $grades->getFactors();
            $factor = $factors->current();
            for ($j = 0; $j < $factors->count(); $j++) {
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->grades->factors[$j]->id,
                    $factor->getId()
                );
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->grades->factors[$j]->title,
                    $factor->getTitle()
                );
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->grades->factors[$j]->description,
                    $factor->getDescription()
                );
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->grades->factors[$j]->value,
                    $factor->getValue()
                );
                $factor = $factors->next();
            }

            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->pro,
                $feedback->getPro()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->contra,
                $feedback->getContra()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->text,
                $feedback->getText()
            );

            $order = $feedback->getOrder();
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->order->shopOrderId,
                $order->getShopOrderId()
            );
            $this->assertEquals(
                $jsonObj->result->feedbackList[$i]->order->delivery,
                $order->getDelivery()
            );
            $comments = $feedback->getComments();
            $comment = $comments->current();
            for ($j = 0; $j < $comments->count(); $j++) {
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->comments[$j]->id,
                    $comment->getId()
                );
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->comments[$j]->createdAt,
                    $comment->getCreatedAt()
                );
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->comments[$j]->author->type,
                    $comment->getAuthor()->getType()
                );
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->comments[$j]->author->name,
                    $comment->getAuthor()->getName()
                );
                $this->assertEquals(
                    $jsonObj->result->feedbackList[$i]->comments[$j]->body,
                    $comment->getBody()
                );
                $comment = $comments->next();
            }
        }
    }
}