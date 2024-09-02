<?php

namespace Danielsmelo\Pagarme\Contracts\Payments;

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

    public function checkoutPayment(
        int $total, 
        string $customer, 
        array $billingAddress, 
        string $due_at = null, 
        int $checkoutTime = 240, 
        int $installmentsValue = 12, 
        int $pixTime = 3600, 
        string $successUrl = 'https://pagar.me',
        string $cardId = null,
    ){
        $installments = [];

        if($due_at == null) {
            $due_at = date('Y-m-d', strtotime('+4 day'));
        }

        for ($i = 1; $i <= $installmentsValue; $i++) {
            $installments[] = [
                "number" => $i,
                "total" => $total
            ];
        }

        return [
            "amount" => $total,
            "customer_id" => $customer,
            "payment_method" => "checkout",
            "checkout" => [
                "expires_in" => $checkoutTime, //tempo em minutos
                "default_payment_method" => "credit_card",
                "customer_editable" => true,
                "billing_address" => $billingAddress,
                "billing_address_editable" => true,
                "skip_checkout_success_page" => false,
                "accepted_payment_methods" => [
                    "credit_card",
                    "pix"
                ],
                "accepted_brands" => [
                    "Visa",
                    "Mastercard",
                    "American Express",
                    "Elo",
                    "Hipercard"
                ],
                "accepted_multi_payment_methods" => [
                    [
                        "credit_card",
                        "credit_card"
                    ],
                ],
                "success_url" => $successUrl,
                "credit_card" => [
                    "operation_type" => "auth_and_capture",
                    "statement_descriptor" => "AVENGERS", //Máximo de 13 caracteres
                    "installments" => $installments,
                    "card_id" => $cardId,
                ],
                "pix" => [
                    "expires_in" => $pixTime, //Tempo em segundos
                ]
            ]
        ];
    }

    public function creditCardPayment(string $customer, string $cardId)
    {
        return [
            "customer_id" => $customer,
            "payment_method" => "credit_card",
            "credit_card" => [
                "recurrence" => false,
                "installments" => 2,
                "statement_descriptor" => "NeST",
                "card_id" => $cardId
            ]
        ];
    }

    public function unsavedCreditCardPayment(
        string $customer,
        string $number,
        string $holderName,
        int $expMonth,
        int $expYear,
        string $cvv,
    ){
        return [
            "customer_id" => $customer,
            "payment_method" => "credit_card",
            "credit_card" => [
                "recurrence" => false,
                "installments" => 2,
                "statement_descriptor" => "NeST",
                "card" => [
                    "number" => $number,
                    "holder_name" => $holderName,
                    "exp_month" => $expMonth,
                    "exp_year" => $expYear,
                    "cvv" => $cvv,
                ]
            ]
        ];
    }
}
