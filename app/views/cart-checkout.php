<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit("Você precisa estar logado para acessar o checkout.");
}

// Verifica se o total do carrinho está definido na sessão
if (!isset($_SESSION['cart_total'])) {
    die("Erro: Nenhum total de carrinho encontrado. Por favor, volte ao carrinho.");
}

$cartTotal = $_SESSION['cart_total'];
$desconto = 10; // Definir o valor de desconto, se necessário
$totalFinal = $cartTotal - $desconto;

?>

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
            background-color: #8c9eff;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
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
            padding: 15px;
            background-color: #333;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }

        .summary p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Formulário de Endereço -->
        <div class="form-section">
            <h1>Dados de Endereço</h1>
            <form action="checkout" method="POST">
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
                    <p>Valor: R$ <?= number_format($cartTotal, 2, ',', '.') ?></p>
                    <p>Desconto: R$ <?= number_format($desconto, 2, ',', '.') ?></p>
                    <p>Total: R$ <?= number_format($totalFinal, 2, ',', '.') ?></p>
                </div>

                <button type="submit" class="btn-finalizar">Finalizar</button>
            </form>
        </div>
    </div>
</body>

</html>