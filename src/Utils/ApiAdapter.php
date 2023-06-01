<?php

namespace Danielsmelo\Pagarme\Utils;

use Exception;
use GuzzleHttp\Client;

abstract class ApiAdapter
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function getHeader()
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode(config('pagarme.api_key') . ':'),
        ];
    }

    public function getFormDataHeader()
    {
        return $headers = [
            'Content-Type' => 'multipart/form-data',
            'Authorization' => 'Basic ' . base64_encode(config('pagarme.api_key') . ':'),
        ];
    }

    public function getUrl(string $url)
    {
        $baseUrl = config('pagarme.base_url');

        if (substr($baseUrl, -1) != '/') {
            $baseUrl .= '/';
        }

        $apiVersion = config('pagarme.api_version');

        if (substr($apiVersion, -1) != '/') {
            $apiVersion .= '/';
        }

        return $baseUrl . $apiVersion . $url;
    }

    public function post(string $url, array $data, $multipart = false)
    {
        $env = env('PAGARME_API_KEY');

        $teste = config('pagarme.api_key');

        $fullUrl = $this->getUrl($url);

        $options = $this->setHeaders($multipart, $data);

        try {
            return $this->client->request('POST', $fullUrl, $options);
        } catch (Exception $e) {
            if ($e->getCode() == 400) {
                throw new Exception($this->getResponseErrorDescription($e));
            }

            throw new Exception($e->getMessage());
        }
    }

    public function put(string $url, $data = null, $multipart = false)
    {
        $fullUrl = $this->getUrl($url);

        $options = $this->setHeaders($multipart, $data);

        try {
            return $this->client->request('PUT', $fullUrl, $options);
        } catch (Exception $e) {
            if ($e->getCode() == 400) {
                throw new Exception($this->getResponseErrorDescription($e));
            }

            throw new Exception($e->getMessage());
        }
    }

    public function get(string $url, $multipart = false)
    {
        $fullUrl = $this->getUrl($url);

        $options = $this->setHeaders($multipart);

        try {
            return $this->client->request('GET', $fullUrl, $options);
        } catch (Exception $e) {
            if ($e->getCode() == 400) {
                throw new Exception($this->getResponseErrorDescription($e));
            }

            throw new Exception($e->getMessage());
        }
    }

    public function delete(string $url, $multipart = false)
    {
        $fullUrl = $this->getUrl($url);

        $options = $this->setHeaders($multipart);

        try {
            return $this->client->request('DELETE', $fullUrl, $options);
        } catch (Exception $e) {
            if ($e->getCode() == 400) {
                throw new Exception($this->getResponseErrorDescription($e));
            }

            throw new Exception($e->getMessage());
        }
    }

    public function getResponseErrorDescription($e)
    {
        if ($e->getCode() == 400) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }

        throw new Exception('Não existe resposta de erro do servidor');
    }

    public function setHeaders(bool $multipart = false, array $data = null): array
    {
        if ($multipart) {
            $options['headers'] = $this->getFormDataHeader();
        }

        $options['headers'] = $this->getHeader();

        if ($data) {
            $options['body'] = json_encode($data);
        }

        return $options;
    }
}
