<?php

namespace Danielsmelo\Pagarme;

class Pagarme
{
    public function __construct(
        protected Endpoints\Customer $customer,
        protected Endpoints\Recipient $recipient,
        protected Endpoints\Charge $charge,
        protected Endpoints\Order $order,
        protected Endpoints\Payload $payload
    ) {}

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

    public function payload()
    {
        return $this->payload;
    }
}
