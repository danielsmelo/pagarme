<?php

namespace Danielsmelo\Pagarme\Contracts;

class Payload
{
    private $order;
    private $charge;
    private $item;
    private $address;
    private $customer;

    public function __construct(
        Payments\Order $order,
        Payments\Charge $charge,
        Payments\Item $item,
        Wallet\Address $address,
        Wallet\Customer $customer
    ) {
        $this->order = $order;
        $this->charge = $charge;
        $this->item = $item;
        $this->address = $address;
        $this->customer = $customer;
    }

    public function order(...$args)
    {
        return $this->order->order(...$args);
    }

    public function checkoutPayment(...$args)
    {
        return $this->charge->checkoutPayment(...$args);
    }

    public function item(...$args)
    {
        return $this->item->item(...$args);
    }

    public function customer(...$args)
    {
        return $this->customer->customer(...$args);
    }

    public function address(...$args)
    {
        return $this->address->address(...$args);
    }

    public function OrderInterface() {
        return $this->order;
    }

    public function ChargeInterface() {
        return $this->charge;
    }

    public function ItemInterface() {
        return $this->item;
    }

    public function CustomerInterface() {
        return $this->customer;
    }
}
