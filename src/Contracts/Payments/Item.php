<?php

namespace Contracts\Payments;

final class Charge
{
    //  Atenção! Só será possível incluir items, se o pedido estiver aberto.
    const INCLUDE_ORDER_ITEM = [
        'amount' => 'numeric',
        'description' => 'string',
        'quantity' => 'integer',
    ];

    const UPDATE_ORDER_ITEM = [
        'amount' => 'numeric',
        'description' => 'string',
        'quantity' => 'integer',
    ];
}
