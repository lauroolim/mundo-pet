<?php $this->layout('userbase', ['title' => 'checkout']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="./css/cart-checkout.css">
<?php $this->stop() ?>

<?php $this->start('main-content'); ?>

    <body>
        <main class="content">
        <form action="/checkout/process" method="POST">
            <div class="container">
                    <!-- Sidebar -->
                    <aside class="sidebar">
                        <h1>Digite seus dados</h1>
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
                    </aside>

                    <!-- Payment Section -->
                    <div class="payment-section">
                        <h1>Pagamento</h1>
                        <div class="cards">
                            <img src="/img/icons/mastercard.png" alt="MasterCard">
                            <img src="/img/icons/visa.png" alt="Visa">
                        </div>

                        <label for="card_name">Nome no cartão</label>
                        <input type="text" id="card_name" name="card_name" required>

                        <label for="card_number">Número do cartão</label>
                        <input type="text" id="card_number" name="card_number" required>

                        <label for="expiration_date">Data de expiração</label>
                        <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/AA" required>

                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" required>

                        <div class="summary">
                            <?php
                            $cartTotal = 0;
                            if (isset($_SESSION['user_id'])) {
                                $cartModel = new \app\database\models\CartModel();
                                $cartTotal = $cartModel->getCartTotal($_SESSION['user_id']);
                                $discount = $cartModel->applyDiscount($cartTotal);
                                $totalAmtotalDiscountountWithDiscount = $discount['totalAmountWithDiscount'];
                                $totalDiscount = $discount['totalDiscount'];
                            }
                            ?>
                            <p>Valor: R$ <?php echo number_format($cartTotal, 2, ',', '.'); ?></p>
                            <p>Desconto: R$ <?php echo number_format($totalDiscount, 2, ',', '.');  ?></p>
                            <p>Total: R$ <?php echo number_format($totalAmtotalDiscountountWithDiscount, 2, ',', '.'); ?></p>

                        </div>


                        <button type="submit" class="btn-finalizar">Finalizar</button>
                    </div>
            </div>
        </form>
        </main>
    </body>
</script>
<?php $this->stop(); ?>