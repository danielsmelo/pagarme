<?php

namespace Danielsmelo\Pagarme\Endpoints;

use Danielsmelo\Pagarme\Contracts\Payments\Charge;
use Danielsmelo\Pagarme\Contracts\Payments\Item;
use Danielsmelo\Pagarme\Contracts\Payments\Order;
use Danielsmelo\Pagarme\Contracts\Wallet\Address;
use Danielsmelo\Pagarme\Contracts\Wallet\Customer;
use Danielsmelo\Pagarme\Contracts\Wallet\CreditCard;

class Payload
{
    private $order;
    private $charge;
    private $item;
    private $address;
    private $customer;
    private $card;

    public function __construct(
        Order $order,
        Charge $charge,
        Item $item,
        Address $address,
        Customer $customer,
        CreditCard $card
    ) {
        $this->order = $order;
        $this->charge = $charge;
        $this->item = $item;
        $this->address = $address;
        $this->customer = $customer;
        $this->card = $card;
    }

    public function order(...$args)
    {
        return $this->order->order(...$args);
    }

    public function checkoutPayment(...$args)
    {
        return $this->charge->checkoutPayment(...$args);
    }

    public function creditCardPayment(...$args)
    {
        return $this->charge->creditCardPayment(...$args);
    }

    public function unsavedCreditCardPayment(...$args)
    {
        return $this->charge->unsavedCreditCardPayment(...$args);
    }

    public function item(...$args)
    {
        return $this->item->item(...$args);
    }

    public function customer(...$args)
    {
        return $this->customer->customer(...$args);
    }

    public function card(...$args)
    {
        return $this->card->card(...$args);
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
