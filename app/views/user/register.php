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
        <h2>Cadastrar</h2>
        <form action="/register" method="POST">
            <div class="input-container">
                <input type="text" placeholder="Nome" name="username" required>
            </div>
            <div class="input-container">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-container">
                <input type="password" placeholder="Senha" name="password" required>
            </div>
            <div class="input-container">
                <input type="text" placeholder="Celular" name="telefone" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>