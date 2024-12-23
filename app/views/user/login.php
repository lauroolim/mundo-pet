<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div id="container">
        <img src="../img/logo.png" alt="Logo Mundo Pet" class="logo">
        <h2>Login</h2>
        <?= isset($message) ? $message : '' ?>
        <form method="POST" action="/login">
            <div class="input-container">
                <img src="../img/icons/email.png">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-container">
                <img src="../img/icons/padlock.png">
                <input type="password" placeholder="Senha" name="password" required>
            </div>
            <button type="submit" class="btn">Entrar</button>
        </form>
        <a href="/register" class="link-cadastro">Cadastre-se</a>

        <div class="social-login">
            <a href="#"><img src="../img/icons/google.png" alt="Logo google"></a>
            <a href="#"><img src="../img/icons/facebook.png" alt="Logo facebook"></a>
        </div>
    </div>
</body>

</html>