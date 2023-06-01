<?php

namespace Danielsmelo\Pagarme\Endpoints;

use Danielsmelo\Pagarme\Utils\ApiAdapter;

class Charge extends ApiAdapter
{

    public function capture($id, array $data)
    {
        return $this->post("charges/{$id}/capture", $data);
    }

    public function create(array $data)
    {
        return $this->post('charges', $data);
    }

    public function find($id)
    {
        return $this->get("charges/{$id}");
    }

    public function editCard($id, array $data)
    {
        return $this->put("charges/{$id}/card", $data);
    }

    public function dueDate($id, array $data)
    {
        return $this->put("charges/{$id}/due-date", $data);
    }

    public function updatePaymentMethod($id, array $data)
    {
        return $this->put("charges/{$id}/payment-method", $data);
    }

    public function cancel($id)
    {
        return $this->delete("charges/{$id}");
    }

    public function all()
    {
        return $this->get('charges');
    }

    public function retry($id)
    {
        return $this->post("charges/{$id}/retry", []);
    }

    public function confirmCash($id, array $data)
    {
        return $this->post("charges/{$id}/confirm-payment", $data);
    }
}
