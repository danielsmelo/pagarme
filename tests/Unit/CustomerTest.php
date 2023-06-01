<?php

use Danielsmelo\Pagarme\Facades\Pagarme;
use Danielsmelo\Pagarme\Tests\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class CustomerTest extends TestCase
{
    public function testCreate()
    {
        $data = [
            'name' => 'Name',
            'email' => 'johndoe@example.com',
            'code' => 'ABC123',
            'document' => '123456789',
            'document_type' => 'CPF',
            'type' => 'individual',
            'gender' => 'male',
            'address' => [
                'country' => 'BR',
                'state' => 'SP',
                'city' => 'Sao Paulo',
                'zip_code' => '12345',
                'line_1' => '123 Main St',
                'line_2' => 'Apt 4B',
            ],
            'phones' => [
                'home_phone' => [
                    'country_code' => '1',
                    'area_code' => '123',
                    'number' => '4567890',
                ],
                'mobile_phone' => [
                    'country_code' => '1',
                    'area_code' => '987',
                    'number' => '6543210',
                ],
            ],
            'birthdate' => '1990-01-01',
            'metadata' => 'Additional information',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->create($data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testFind()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->find(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdate()
    {
        $data =  [
            'name' => 'Name',
            'email' => 'johndoe@gmail.com',
            'code' => 'ABC123',
            'document' => '123456789',
            'document_type' => 'CPF',
            'type' => 'individual',
            'gender' => 'male',
            'address' => [
                'country' => 'BR',
                'state' => 'SP',
                'city' => 'Sao Paulo',
                'zip_code' => '12345',
                'line_1' => '123 Main St',
                'line_2' => 'Apt 4B',
            ],
            'phones' => [
                'home_phone' => [
                    'country_code' => '1',
                    'area_code' => '123',
                    'number' => '4567890',
                ],
                'mobile_phone' => [
                    'country_code' => '1',
                    'area_code' => '987',
                    'number' => '6543210',
                ],
            ],
            'birthdate' => '1990-01-01',
            'metadata' => 'Additional information',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->update(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);

        $this->assertEquals($response->getBody()->getContents(), 'Mocked Response');
    }

    public function testAll()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->all();

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCreateCreditCard()
    {
        $data = [
            'billing_address' => [
                'line_1' => '123 Main St',
                'line_2' => 'Apt 4B',
                'zip_code' => '12345',
                'city' => 'Sao Paulo',
                'state' => 'SP',
                'country' => 'BR',
            ],
            'number' => '4111111111111111',
            'holder_name' => 'Name',
            'holder_document' => '123456789',
            'exp_month' => '12',
            'exp_year' => '25',
            'cvv' => '123',
            'brand' => 'visa',
            'label' => 'visa',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->createCreditCard(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testFindCreditCard()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->findCreditCard(1, 1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testAllCreditCards()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);

        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->allCreditCards(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdateCreditCard()
    {
        $data = [
            'card_number' => '4111111111111111',
            'card_holder_name' => 'Name',
            'card_expiration_date' => '1225',
            'card_cvv' => '123',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->updateCreditCard(1, 1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDeleteCreditCard()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->deleteCreditCard(1, 1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testRenewCreditCard()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->renewCreditCard(1, 1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testCreateAddress(){
        $data = [
            'country' => 'BR',
            'state' => 'SP',
            'city' => 'Sao Paulo',
            'zip_code' => '12345',
            'line_1' => '123 Main St',
            'line_2' => 'Apt 4B',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->createAddress(1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testFindAddress(){
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->findAddress(1, 1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testAllAddresses(){
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->allAddresses(1);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testUpdateAddress(){
        $data = [
            'country' => 'BR',
            'state' => 'SP',
            'city' => 'Sao Paulo',
            'zip_code' => '12345',
            'line_1' => '123 Main St',
            'line_2' => 'Apt 4B',
        ];

        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->updateAddress(1, 1, $data);

        $this->assertEquals($response->getStatusCode(), 200);
    }

    public function testDeleteAddress(){
        $mockHandler = new MockHandler([
            new Response(200, [], 'Mocked Response'),
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        Pagarme::customer()->setClient(new GuzzleClient(['handler' => $handlerStack]));

        $response = Pagarme::customer()->deleteAddress(1, 1);

        $this->assertEquals($response->getStatusCode(), 200);
    }
}
