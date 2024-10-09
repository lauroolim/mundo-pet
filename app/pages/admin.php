<?php
// Verifica se a sessão já está ativa
if (session_status() === PHP_SESSION_NONE) {
  session_start(); // Inicia a sessão se ainda não foi iniciada
}


if (!isset($_SESSION['admin'])) {
  header('Location: login.php?message=login_required');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Administrativo - Mundo Pet</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <header>
    <nav id="nav-bar">
      <div class="logo">
        <img src="../img/logo.png" alt="Logo Mundo Pet">
      </div>
      <ul class="list-nav">
        <li class="title"><a href="#">Serviços</a></li>
        <li class="title"><a href="catalogo.php">Loja</a></li>
        <li class="title"><a href="#">Sobre</a></li>
        <li><a href="#"><img src="../img/icons/user.png"></a></li>
      </ul>
    </nav>
  </header>

  <div id="container">
    <!-- Menu lateral -->
    <aside class="sidebar">
      <h3>Painel Administrativo</h3>
      <ul>
        <li><a href="#">Usuários</a></li>
        <li><a href="#">Relatórios</a></li>
      </ul>
    </aside>

    <section class="content">
      <div class="user-section">
        <div class="profile-pic">
          <img src="../img/icons/user.png" alt="Foto do administrador">
        </div>
        <div class="user-info">
          <h2>Administrador</h2>
          <!-- Botão de logout -->
          <a href="logout.php" class="logout-btn">Logout</a>
        </div>
      </div>

      <div class="admin-options">
        <button class="admin-btn" onclick="window.location.href='adminAgendamentos.php'">Agendamento</button>
        <button class="admin-btn" onclick="window.location.href='adminProdutos.php'">Gerenciar Produtos</button>
      </div>
    </section>
  </div>
</body>

</html>