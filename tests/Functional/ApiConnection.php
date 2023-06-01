<?php

use Danielsmelo\Pagarme\Facades\Pagarme;
use Danielsmelo\Pagarme\Tests\TestCase;

class ApiConnection extends TestCase
{
    public function testApiConnection()
    {
        // Dados do cliente para criar
        $customerData = [
            "type" => "individual", // individual ou company
            "name" => "Api Connection",
            "email" => "testapi@connection.com.br",
            "document_type" => "CPF", // CPF, CNPJ ou PASSPORT
            "document" => "52578863830",
            "gender" => "male",
            "phones" => [
                "home_phone" => [
                    "country_code" => "55",
                    "area_code" => "11",
                    "number" => "000000000"
                ],
                "mobile_phone" => [
                    "country_code" => "55",
                    "area_code" => "11",
                    "number" => "000000000"
                ]
            ],
            "address" => [
                "line_1" => "7220, Avenida Dra Ruth Cardoso, Pinheiros",
                "line_2" => "Prédio",
                "zip_code" => "05425070",
                "city" => "São Paulo",
                "state" => "SP",
                "country" => "BR"
            ],
            "code" => "123", //Código de referência no sistema da loja. Max => 52 caracteres
            "birthdate" => "01/09/1993",
            "metadata" => [
                "company" => "Test",
            ],
        ];

        // Chamar o método create() da classe Customer
        $response = Pagarme::customer()->create($customerData);

        // Verificar se a resposta foi bem-sucedida
        $this->assertEquals(200, $response->getStatusCode());

        // Verificar se a resposta contém os dados esperados
        $responseData = json_decode($response->getBody(), true);
        $this->assertArrayHasKey('id', $responseData);
        $this->assertEquals('Api Connection', $responseData['name']);
        $this->assertEquals('testapi@connection.com.br', $responseData['email']);
    }
}
