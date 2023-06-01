# Pagar.me Laravel SDK

[![Última versão no Packagist](https://img.shields.io/packagist/v/danielsmelo/pagarme.svg?style=flat-square)](https://packagist.org/packages/danielsmelo/pagarme)

Esse pacote existe devido à necessidade de integração de um projeto de terceiro com o pagar.me. Não existe nenhum vínculo do desenvolvedor desta SDK com a empresa pagar.me

## Instalação

Você pode instalar o pacote via composer.

```bash
composer require danielsmelo/pagarme
```

Você pode publicar o arquivo de configuração com:

```bash
php artisan vendor:publish --tag="pagarme-config"
```

Estes são os conteúdos do arquivo de configuração publicado:

```php
return [
    'api_key'     => 'sua_api_key',
    'base_url'    => 'https://api.pagar.me/core',
    'api_version' => 'v5',
];
```

## Uso

Cada função corresponde a um endpoint da API disponibilizada pelo pagar.me (https://api.pagar.me/core/v5).

---

### Customers

---

Rota: POST /customers

Função:
```php
Pagarme::client()->create(array $data)
```

Descrição: Cria um novo cliente com base nos dados fornecidos.

---

Rota: GET /customers/{id}

Função:
```php
Pagarme::client()->find(string $id)
```

Descrição: Obtém as informações de um cliente específico com base no ID.

---

Rota: PUT /customers/{id}

Função:
```php
Pagarme::client()->update(string $id, array $data)
```

Descrição: Atualiza as informações de um cliente específico com base no ID e nos novos dados fornecidos.

---

Rota: GET /customers

Função:
```php
Pagarme::client()->all()
```

Descrição: Obtém uma lista de todos os clientes cadastrados.

---

Rota: POST /customers/{id}/cards

Função:
```php
Pagarme::client()->createCreditCard(string $id, array $data)
```

Descrição: Cria um novo cartão de crédito associado a um cliente específico com base no ID e nos dados do cartão.

---

Rota: GET /customers/{id}/cards/{cardId}

Função:
```php
Pagarme::client()->findCreditCard(string $id, string $cardId)
```

Descrição: Obtém as informações de um cartão de crédito específico associado a um cliente com base nos IDs do cliente e do cartão.

---

Rota: GET /customers/{id}/cards

Função:
```php
Pagarme::client()->allCreditCards(string $id)
```

Descrição: Obtém uma lista de todos os cartões de crédito associados a um cliente específico com base no ID do cliente.

---

Rota: PUT /customers/{id}/cards/{cardId}

Função:
```php
Pagarme::client()->updateCreditCard(string $id, $cardId, array $data)
```

Descrição: Atualiza as informações de um cartão de crédito específico associado a um cliente com base nos IDs do cliente e do cartão, e nos novos dados fornecidos.

---

Rota: DELETE /customers/{id}/cards/{cardId}

Função:
```php
Pagarme::client()->deleteCreditCard(string $id, string $cardId)
```

Descrição: Exclui um cartão de crédito específico associado a um cliente com base nos IDs do cliente e do cartão.

---

Rota: POST /customers/{id}/cards/{cardId}/renew

Função:
```php
Pagarme::client()->renewCreditCard(string $id, string $cardId)
```

Descrição: Renova um cartão de crédito específico associado a um cliente com base nos IDs do cliente e do cartão.

---

Rota: POST /customers/{id}/addresses

Função:
```php
Pagarme::client()->createAddress(string $id, array $data)
```

Descrição: Cria um novo endereço associado a um cliente específico com base no ID fornecido e nos dados do endereço.

---

Rota: GET /customers/{id}/addresses/{addressId}

Função:
```php
Pagarme::client()->findAddress(string $id, string $addressId)
```

Descrição: Obtém as informações de um endereço específico associado a um cliente com base nos IDs do cliente e do endereço.

---

Rota: GET /customers/{id}/addresses

Função:
```php
Pagarme::client()->allAddresses(string $id)
```

Descrição: Obtém uma lista de todos os endereços associados a um cliente específico com base no ID do cliente.

---

Rota: PUT /customers/{id}/addresses/{addressId}

Função:
```php
Pagarme::client()->updateAddress(string $id, $addressId, array $data)
```

Descrição: Atualiza as informações de um endereço específico associado a um cliente com base nos IDs do cliente e do endereço, e nos novos dados fornecidos.

---

Rota: DELETE /customers/{id}/addresses/{addressId}

Função:
```php
Pagarme::client()->deleteAddress(string $id, string $addressId)
```

Descrição: Exclui um endereço específico associado a um cliente com base nos IDs do cliente e do endereço.

---

### Charge

---

Rota: POST /charges/{id}/capture

Função:
```php
Pagarme:charge()->capture(string $id, array $data)
```

Descrição: Captura um pagamento pendente associado a uma cobrança específica com base no ID da cobrança e nos dados fornecidos.

---

Rota: POST /charges

Função:
```php
Pagarme:charge()->create(array $data)
```

Descrição: Cria uma nova cobrança com base nos dados fornecidos.

---

Rota: GET /charges/{id}

Função:
```php
Pagarme:charge()->find(string $id)
```

Descrição: Obtém as informações de uma cobrança específica com base no ID.

---

Rota: PUT /charges/{id}/card

Função:
```php
Pagarme:charge()->editCard(string $id, array $data)
```

Descrição: Edita as informações do cartão associado a uma cobrança específica com base no ID da cobrança e nos novos dados fornecidos.

---

Rota: PUT /charges/{id}/due-date

Função:
```php
Pagarme:charge()->dueDate(string $id, array $data)
```

Descrição: Atualiza a data de vencimento de uma cobrança específica com base no ID da cobrança e na nova data de vencimento.

---

Rota: PUT /charges/{id}/payment-method

Função:
```php
Pagarme:charge()->updatePaymentMethod(string $id, array $data)
```

Descrição: Atualiza o método de pagamento associado a uma cobrança específica com base no ID da cobrança e nos novos dados do método de pagamento.

---

Rota: DELETE /charges/{id}

Função:
```php
Pagarme:charge()->cancel(string $id)
```

Descrição: Cancela uma cobrança específica com base no ID.

---

Rota: GET /charges

Função:
```php
Pagarme:charge()->all()
```

Descrição: Obtém uma lista de todas as cobranças.

---

Rota: POST /charges/{id}/retry

Função:
```php
Pagarme:charge()->retry(string $id)
```

Descrição: Tenta novamente realizar um pagamento para uma cobrança específica que tenha falhado anteriormente, com base no ID da cobrança.

---

Rota: POST /charges/{id}/confirm-payment

Função:
```php
Pagarme:charge()->confirmCash(string $id, array $data)
```

Descrição: Confirma o pagamento em dinheiro associado a uma cobrança específica com base no ID da cobrança e nos dados fornecidos.

---

### Order

---

Rota: POST /orders

Função:
```php
Pagarme:order()->create(array $data)
```

Descrição: Cria um novo pedido com base nos dados fornecidos.

---

Rota: GET /orders/{id}

Função:
```php
Pagarme:order()->find(string $id)
```

Descrição: Obtém as informações de um pedido específico com base no ID.

---

Rota: POST /orders/{id}/closed

Função:
```php
Pagarme:order()->close(string $id)
```

Descrição: Fecha um pedido específico com base no ID.

---

Rota: GET /orders

Função:
```php
Pagarme:order()->all()
```

Descrição: Obtém uma lista de todos os pedidos.

---

Rota: POST /orders/{id}/items

Função:
```php
Pagarme:order()->addItem(string $id, array $data)
```

Descrição: Adiciona um novo item a um pedido específico com base no ID do pedido fornecido e nos dados do item.

---

Rota: PUT /orders/{id}/items/{itemId}

Função:
```php
Pagarme:order()->updateItem(string $id, string $itemId, array $data)
```

Descrição: Atualiza as informações de um item específico associado a um pedido com base nos IDs do pedido e do item, e nos novos dados fornecidos.

---

Rota: DELETE /orders/{id}/items/{itemId}

Função:
```php
Pagarme:order()->deleteItem(string $id, string $itemId)
```

Descrição: Exclui um item específico associado a um pedido com base nos IDs do pedido e do item.

---

Rota: DELETE /orders/{id}/items

Função:
```php
Pagarme:order()->deleteAllItems(string $id)
```

Descrição: Exclui todos os itens associados a um pedido específico com base no ID do pedido.

---

Rota: GET /orders/{id}/items

Função:
```php
Pagarme:order()->allItems(string $id)
```

Descrição: Obtém uma lista de todos os itens associados a um pedido específico com base no ID do pedido.

---

### Recipients

---

Rota: POST /recipients

Função:
```php
Pagarme:recipent()->create(array $data)
```

Descrição: Cria um novo destinatário com base nos dados fornecidos.

---

Rota: GET /recipients/{id}

Função:
```php
Pagarme:recipent()->find(string $id)
```

Descrição: Obtém as informações de um destinatário específico com base no ID.

---

Rota: PUT /recipients/{id}

Função:
```php
Pagarme:recipent()->update(string $id, array $data)
```

Descrição: Atualiza as informações de um destinatário específico com base no ID e nos novos dados fornecidos.

---

Rota: GET /recipients

Função:
```php
Pagarme:recipent()->all()
```

Descrição: Obtém uma lista de todos os destinatários.

---

## Changelog

Por favor, consulte [CHANGELOG](CHANGELOG.md)  para mais informações sobre o que foi alterado recentemente.

## Credits

- [Daniel Melo](https://github.com/danielsmelo)

## License

Licença MIT (MIT). Por favor, consulte o [Arquivo de Licença](LICENSE.md) para mais informações.
