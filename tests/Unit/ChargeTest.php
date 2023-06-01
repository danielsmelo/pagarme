<?php

use Danielsmelo\Pagarme\Facades\Pagarme;
use Danielsmelo\Pagarme\Tests\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class ChargeTest extends TestCase
{
    public function testCapture()
    {
        $data = [
            'ammount' => 1000,
            'code' => 'ABC123',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->capture(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCreate()
    {
        $data = [
            'order_id' => 'or_1',
            'amount' => 1000,
            'payment' => [
                'payment_method' => 'credit_card',
                'card_id' => 1,
                'card_cvv' => 123,
                'card_holder_name' => 'Name',
                'card_expiration_date' => '1225',
                'card_number' => '4111111111111111',
            ],
            'due_date' => '2019-01-01',
            'customer_id' => 'cus_1',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->create($data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testFind()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->find(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testEditCard()
    {
        $data = [
            'card_id' => 1,
            'card_cvv' => 123,
            'card_holder_name' => 'Name',
            'card_expiration_date' => '1225',
            'card_number' => '4111111111111111',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->editCard(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDueDate()
    {
        $data = [
            'due_date' => '2019-01-01',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->dueDate(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdatePaymentMethod()
    {
        $data = [
            'payment_method' => 'credit_card',
            'card_id' => 1,
            'card_cvv' => 123,
            'card_holder_name' => 'Name',
            'card_expiration_date' => '1225',
            'card_number' => '4111111111111111',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->updatePaymentMethod(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCancel()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->cancel(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testAll()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->all();

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testRetry()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->retry(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testConfirmCash()
    {
        $data = [
            'amount' => '1000',
            'code' => '123456',
            'description' => 'test',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::charge()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::charge()->confirmCash(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
