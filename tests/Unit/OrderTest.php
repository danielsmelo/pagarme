<?php

use Danielsmelo\Pagarme\Facades\Pagarme;
use Danielsmelo\Pagarme\Tests\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class OrderTest extends TestCase
{
    public function testCreate()
    {
        $data = [
            'code' => 'abc123',
            'customer_id' => 'cus_1',
            'items' => [
                [
                    'ammoount' => 1000,
                ],
            ],
            'shipping' => [
                'name' => 'Name',
                'fee' => 1000,
                'delivery_date' => '2019-01-01',
                'expedited' => true,
                'address' => [
                    'street' => 'Rua teste',
                ],
            ],
            'payments' => [
                [
                    'payment_method' => 'credit_card',
                ],
            ]
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->create($data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testFind()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->find(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testClose()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->close(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testAll()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->all();

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testAddItem()
    {
        $data = [
            'ammoount' => 1000,
            'code' => 'ABC123',
            'description' => 'Teste',
            'quantity' => 1,
            'category' => 'Teste',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->addItem(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdateItem()
    {
        $data = [
            'ammoount' => 1000,
            'code' => 'ABC123',
            'description' => 'Teste',
            'quantity' => 1,
            'category' => 'Teste',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->updateItem(1, 1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDeleteItem()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->deleteItem(1, 1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDeleteAllItems()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->deleteAllItems(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testAllItems()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::order()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::order()->allItems(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
