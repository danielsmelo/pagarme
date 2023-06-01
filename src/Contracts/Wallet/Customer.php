<?php

namespace Contracts\Wallet;

final class Customer
{
    //  É importante destacar que o campo e-mail é único, ou seja, caso seja requisitada a criação de um cliente com um e-mail já cadastrado, o endpoint irá atualizar os dados do customer anteriormente cadastrado com o email informado.
    const CREATE_CUSTOMER = [
        'type' => 'in:individual,company',
        'name' => 'string',
        'email' => 'email',
        'document_type' => 'in:CPF,CNPJ,PASSPORT',
        'document' => 'string',
        'gender' => 'in:male,female',
        'phones' => 'array',
        'address' => 'array',
        'code' => 'string|max:52',
        'birthdate' => 'date_format:d/m/Y',
        'metadata' => 'array',
    ];

    //  Este endpoint altera todos os dados do customer! Ao enviar uma requisição sem todas as informações do customer, as informações não enviadas serão sobrescritas como 'null'. Por exemplo: Se o customer já tem um telefone cadastrado e você realizar esse PUT sem o dado de telefone, o telefone será apagado.
    const UPDATE_CUSTOMER = [
        'type' => 'in:individual,company',
        'name' => 'string',
        'email' => 'email',
        'document_type' => 'in:CPF,CNPJ,PASSPORT',
        'document' => 'string',
        'gender' => 'in:male,female',
        'phones' => 'array',
        'address' => 'array',
        'code' => 'string|max:52',
        'birthdate' => 'date_format:d/m/Y',
        'metadata.company' => 'array',
    ];
}
