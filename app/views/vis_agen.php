<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Agendamentos</title>
    <link rel="icon" href="/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/vis_agen.css">
</head>
<body>
    <div id="nav-bar">
        <?php $this->insert('partials/nav-bar'); ?>
    </div>

    <div class="container">
        <aside class="sidebar">
            <button>Meu Perfil</button>
            <button>Agendamentos</button>
        </aside>

        <main class="content">
            <div class="user-card">
                <img src="../img/icons/user.png" alt="Foto do usuário" class="user-avatar">
                <span class="user-name"><?= htmlspecialchars($username) ?></span>
                <button class="edit-btn">Editar</button>
            </div>

            <?php if (!empty($agendamentos)): ?>
                <?php foreach ($agendamentos as $item): ?>
                <div class="appointment">
                    <div class="titulo">
                        <p> <?= htmlspecialchars($item['service_type']) ?></p>
                        <p> <?= htmlspecialchars($item['date']) ?></p>
                        <p>Horário: <?= htmlspecialchars($item['time']) ?></p>
                    </div>
                    <div class="button-group">
                        <button class="delete-btn">✖</button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Você não tem agendamentos no momento.</p>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
