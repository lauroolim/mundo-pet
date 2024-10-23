<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .form-section {
            width: 60%;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }

        .payment-section {
            width: 35%;
            background-color: #6C5E9C;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        h1 {
            font-size: 27px;
            color: black;
            margin: revert;
        }

        input {
            width: 93%;
            padding: 16px;
            margin: 10px 0;
            border-radius: 22px;
            border: 2px #fff;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
        }

        .btn-finalizar {
            display: block;
            width: 100%;
            padding: 16px;
            background-color: #4F5B93;
            color: white;
            text-align: center;
            border-radius: 15px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-finalizar:hover{
            background-color: #575BA7;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="form-section">
            <h1>Volte ao carrinho</h1>
            <form action="/checkout/process" method="POST">
                <label for="name">Nome Completo</label>
                <input type="text" id="name" name="name" required>

                <label for="city">Cidade</label>
                <input type="text" id="city" name="city" required>

                <label for="address">Endereço</label>
                <input type="text" id="address" name="address" required>

                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" required>

                <label for="complement">Complemento</label>
                <input type="text" id="complement" name="complement">
            </form>
        </div>

        <!-- Seção de Pagamento -->
        <div class="payment-section">
            <h1>Pagamento</h1>
            <div class="cards">
                <img src="/img/mastercard.png" alt="MasterCard">
                <img src="/img/visa.png" alt="Visa">
            </div>
            <form action="/checkout" method="POST">
                <label for="card_name">Nome no cartão</label>
                <input type="text" id="card_name" name="card_name" required>

                <label for="card_number">Número do cartão</label>
                <input type="text" id="card_number" name="card_number" required>

                <label for="expiration_date">Data de expiração</label>
                <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/AA" required>

                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required>

                <div class="summary">
                    <p>Valor: R$ 200</p>
                    <p>Desconto: R$ 10</p>
                    <p>Total: R$ 190</p>
                </div>

                <button type="submit" class="btn-finalizar">Finalizar</button>
            </form>
        </div>
    </div>
</body>

</html>