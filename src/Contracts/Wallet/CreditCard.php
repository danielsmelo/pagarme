<?php

namespace Danielsmelo\Pagarme\Contracts\Wallet;

final class CreditCard
{
    const CREATE_CREDIT_CARD = [
        'number' => 'string',
        'holder_name' => 'string',
        'holder_document' => 'string',
        'exp_month' => 'integer|min:1|max:12',
        'exp_year' => 'date_format:y|after_or_equal:now',
        'cvv' => 'string|min:3|max:4',
        'brand' => 'string',
        'label' => 'string',
        'billing_address' => 'array',
        'metadata' => 'array',
    ];

    const UPDATE_CREDIT_CARD = [
        'billing_address' => 'array',
        'holder_name' => 'string',
        'exp_month' => 'integer|min:1|max:12',
        'exp_year' => 'date_format:Y|after_or_equal:now',
    ];

    //  Atenção! A entidade de billing address do cartão não é tokenizada. Logo, ao criar um pedido/cobrança com token também será preciso informar o billing address.
    const CREATE_CREDIT_CARD_TOKEN = [
        'type' => 'string',
        'card' => 'array',
        'card.number' => 'string',
        'card.holder_name' => 'string',
        'card.holder_document' => 'string',
        'card.exp_month' => 'integer|min:1|max:12',
        'card.exp_year' => 'date_format:y|after_or_equal:now',
        'card.cvv' => 'string|min:3|max:4',
        'card.brand' => 'string',
        'card.label' => 'string',
        'card.billing_address' => 'array',
    ];

    public function card(
        string $number, 
        string $holder, 
        string $document, 
        int $expMonth, 
        string $expYear, 
        string $cvv,
    ){
        return [
            'number' => $number,
            'holder_name' => $holder,
            'holder_document' => $document,
            'exp_month' => $expMonth,
            'exp_year' => $expYear,
            'cvv' => $cvv,
        ];
    }
}
