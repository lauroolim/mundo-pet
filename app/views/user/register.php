<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>
    <div id="container">
        <img src="../img/logo.png" alt="Logo Mundo Pet" class="logo">
        <h2>Cadastrar</h2>
        <form action="/register" method="POST">
            <div class="input-container">
                <img src="../img/icons/user-fill.png">
                <input type="text" placeholder="Nome" name="username" required>
            </div>
            <div class="input-container">
                <img src="../img/icons/email.png">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-container">
                <img src="../img/icons/padlock.png">
                <input type="password" placeholder="Senha" name="password" required>
            </div>
            <div class="input-container">
                <img src="../img/icons/phone-solid.png">
                <input type="text" placeholder="Celular" name="phone" required>
            </div>
            <div class="button-container">
                <button class="btn">Cadastrar</button>
            </div>
        </form>
        <div class="social-login">
            <a href="#"><img src="../img/icons/google.png" alt="Logo google"></a>
            <a href="#"><img src="../img/icons/facebook.png" alt="Logo facebook"></a>
        </div>
    </div>
</body>

</html>