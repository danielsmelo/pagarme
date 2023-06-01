<?php

namespace Contracts\Payments;

final class Charge
{
    //  Caso o valor a ser capturado não seja informado, será considerado o valor total da cobrança.
    const CAPTURE_CHARGE = [
        'amount' => 'numeric',
        'code' => 'string|max:52',
    ];

    const UPDATE_CHARGE_CREDIT_CARD = [
        'card' => 'array',
        'card_id' => 'string',
        'card_token' => 'string',
        'card.billing_address' => 'array',
    ];

    const UPDATE_CHARGE_PAYMENT_METHOD = [
        'payment_method' => 'string',
        'boleto' => 'array',
        'credit_card' => 'array',
        'pix' => 'array',
    ];

    const UPDATE_CHARGE_DUE_DATE = [
        'due_at' => 'date'
    ];

    //  Atenção! Só será possível incluir cobranças, se o pedido estiver aberto.
    const INCLUDE_ORDER_CHARGE_CREDIT_CARD = [
        'order_id' => 'string',
        'amount' => 'integer',
        'payment.payment_method' => 'string',
        'payment.credit_card.installments' => 'integer',
        'payment.credit_card.statement_descriptor' => 'string|max:13',
        'payment.credit_card.card' => 'array',
    ];

    const INCLUDE_ORDER_CHARGE_BANK_SLIP = [
        'order_id' => 'string',
        'amount' => 'integer',
        'payment.payment_method' => 'string',
        'payment.boleto.instructions' => 'string',
        'payment.boleto.due_at' => 'date',
    ];

    const INCLUDE_ORDER_CHARGE_PIX = [
        'order_id' => 'string',
        'amount' => 'integer',
        'payment.payment_method' => 'string',
        'payment.pix.expires_in' => 'integer',
        'payment.pix.additional_information' => 'array',
        'payment.pix.additional_information.*.name' => 'string',
        'payment.pix.additional_information.*.value' => 'string',
    ];
}
