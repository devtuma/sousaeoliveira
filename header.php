<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sousa e Oliveira Advogados</title>
    <link rel="stylesheet" href="/public/style13.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <h1>Sousa e Oliveira Advogados</h1>
                </div>
                <ul class="nav-links">
                    <?php if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']): ?>
                        <li><a href="/#home">Início</a></li>
                        <li><a href="/#about">Sobre Nós</a></li>
                        <li><a href="/#areas-atuacao">Áreas de Atuação</a></li>
                        <li><a href="/#equipe">Equipe</a></li>
                        <li><a href="/#blog">Blog</a></li>
                        <li><a href="/#contato">Contato</a></li>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>
                        <li class="user-info">
                            <span style="color: yellow;"><?php echo $_SESSION['user_title'] . ' ' . $_SESSION['user_name']; ?></span>
                            <a href="/controllers/logout.php" class="btn-logout">Sair</a>
                        </li>
                    <?php else: ?>
                        <li><a href="/views/login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </div>
        </nav>
    </header>
