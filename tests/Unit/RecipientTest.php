<?php

use Danielsmelo\Pagarme\Facades\Pagarme;
use Danielsmelo\Pagarme\Tests\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class RecipientTest extends TestCase
{
    public function testCreate()
    {
        $data = [
            'name' => 'Name',
            'email' => 'test@gmail.com',
            'description' => 'Description',
            'document' => 'CPF',
            'type' => 'individual',
            'code' => 'ABC123',
            'default_bank_account' => [],
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::recipient()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::recipient()->create($data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testFind()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::recipient()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::recipient()->find(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdate()
    {
        $data = [
            'name' => 'Name',
            'email' => 'test@gmail.com',
            'description' => 'Description',
            'document' => 'CPF',
            'type' => 'individual',
            'code' => 'ABC123',
            'default_bank_account' => [],
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::recipient()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::recipient()->update(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testAll()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::recipient()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::recipient()->all();

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
