<?php

namespace Danielsmelo\Pagarme\Endpoints;

use Danielsmelo\Pagarme\Utils\ApiAdapter;

class Order extends ApiAdapter
{
    public function create(array $data)
    {
        return $this->post('orders', $data);
    }

    public function find($id)
    {
        return $this->get("orders/{$id}");
    }

    public function close($id)
    {
        return $this->post("orders/{$id}/closed", []);
    }

    public function all()
    {
        return $this->get('orders');
    }

    public function addItem($id, array $data)
    {
        return $this->post("orders/{$id}/items", $data);
    }

    public function updateItem($id, $itemId, array $data)
    {
        return $this->put("orders/{$id}/items/{$itemId}", $data);
    }

    public function deleteItem($id, $itemId)
    {
        return $this->delete("orders/{$id}/items/{$itemId}");
    }

    public function deleteAllItems($id)
    {
        return $this->delete("orders/{$id}/items");
    }

    public function allItems($id)
    {
        return $this->get("orders/{$id}/items");
    }
}