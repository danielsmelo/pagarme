<?php

namespace Danielsmelo\Pagarme\Endpoints;

use Danielsmelo\Pagarme\Utils\ApiAdapter;

class Customer extends ApiAdapter
{
    public function create(array $data)
    {
        return $this->post('customers', $data);
    }

    public function find($id)
    {
        return $this->get("customers/{$id}");
    }

    public function update($id, array $data)
    {
        return $this->put("customers/{$id}", $data);
    }

    public function all()
    {
        return $this->get('customers');
    }

    public function createCreditCard($id, array $data)
    {
        return $this->post("/customers/{$id}/cards", $data);
    }

    public function findCreditCard($id, $cardId)
    {
        return $this->get("/customers/{$id}/cards/{$cardId}");
    }

    public function allCreditCards($id)
    {
        return $this->get("/customers/{$id}/cards");
    }

    public function updateCreditCard($id, $cardId, array $data)
    {
        return $this->put("/customers/{$id}/cards/{$cardId}", $data);
    }

    public function deleteCreditCard($id, $cardId)
    {
        return $this->delete("/customers/{$id}/cards/{$cardId}");
    }

    public function renewCreditCard($id, $cardId)
    {
        return $this->post("/customers/{$id}/cards/{$cardId}/renew", []);
    }

    public function createAddress($id, array $data)
    {
        return $this->post("/customers/{$id}/addresses", $data);
    }

    public function findAddress($id, $addressId)
    {
        return $this->get("/customers/{$id}/addresses/{$addressId}");
    }

    public function allAddresses($id)
    {
        return $this->get("/customers/{$id}/addresses");
    }

    public function updateAddress($id, $addressId, array $data)
    {
        return $this->put("/customers/{$id}/addresses/{$addressId}", $data);
    }

    public function deleteAddress($id, $addressId)
    {
        return $this->delete("/customers/{$id}/addresses/{$addressId}");
    }
}
