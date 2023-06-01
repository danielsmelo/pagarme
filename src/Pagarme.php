<?php

namespace Danielsmelo\Pagarme;

class Pagarme
{
    protected $customer;
    protected $recipient;
    protected $charge;
    protected $order;

    public function __construct(
        Endpoints\Customer $customer,
        Endpoints\Recipient $recipient,
        Endpoints\Charge $charge,
        Endpoints\Order $order
    ) {
        $this->customer = $customer;
        $this->recipient = $recipient;
        $this->charge = $charge;
        $this->order = $order;
    }

    public function customer()
    {
        return $this->customer;
    }

    public function recipient()
    {
        return $this->recipient;
    }

    public function charge()
    {
        return $this->charge;
    }

    public function order()
    {
        return $this->order;
    }
}
