<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

// Verifica se o usuário está logado e é um advogado admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'lawyer') {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

// Consultas para obter dados como o número de casos, advogados, clientes, etc.
$active_cases = $conn->query("SELECT COUNT(*) AS total FROM cases WHERE status = 'ativo'")->fetch_assoc()['total'];
$total_lawyers = $conn->query("SELECT COUNT(*) AS total FROM lawyers")->fetch_assoc()['total'];
$total_clients = $conn->query("SELECT COUNT(*) AS total FROM clients")->fetch_assoc()['total'];

// Consultar últimos documentos adicionados (limite de 5)
$recent_documents = $conn->query("SELECT document_name, file_path FROM documents ORDER BY uploaded_at DESC LIMIT 5");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrativo - Sousa e Oliveira Advogados</title>
    <link rel="stylesheet" href="../public/style_dashboard3.css">
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

                        <li class="user-info">
                            <span style="color: yellow;"><?php echo $_SESSION['user_title'] . ' ' . $_SESSION['user_name']; ?></span>
                            <a href="/controllers/logout.php" class="btn-logout">Sair</a>
                        </li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </div>
        </nav>
    </header>
<!-- Menu de Navegação Lateral -->
<nav class="sidebar">
    <ul>
        <li><a href="manage_lawyers.php">Gerenciar Advogados</a></li>
        <li><a href="manage_clients.php">Gerenciar Clientes</a></li>
        <li><a href="create_case.php">Criar Novo Caso</a></li>
        <li><a href="manage_cases.php">Gerenciar Casos</a></li>
        <li><a href="upload_document.php">Upload de Documentos</a></li>
        <li><a href="manage_documents.php">Gerenciar Documentos</a></li>
        <li><a href="internal_messages.php">Mensagens Internas</a></li>
        <li><a href="communication_history.php">Histórico de Comunicações</a></li>
        <li><a href="lawyer_performance.php">Desempenho dos Advogados</a></li>
        <li><a href="case_reports.php">Relatórios de Casos</a></li>
        <li><a href="financial_reports.php">Relatórios Financeiros</a></li>
        <li><a href="permissions.php">Configurações de Permissões</a></li>
        <li><a href="office_settings.php">Configurações do Escritório</a></li>
    </ul>
</nav>

<!-- Painel Principal -->
<section id="admin_dashboard_main">
    <div class="container">
        <!-- Visão Geral do Escritório -->
        <div class="dashboard-overview">
            <h3>Visão Geral do Escritório</h3>
            <p>Casos Ativos: <?php echo $active_cases; ?> | Advogados: <?php echo $total_lawyers; ?> | Clientes: <?php echo $total_clients; ?></p>
            <p>Últimos Documentos Adicionados:</p>
            <ul>
                <?php while($doc = $recent_documents->fetch_assoc()): ?>
                    <li><a href="../uploads/<?php echo $doc['file_path']; ?>" target="_blank"><?php echo $doc['document_name']; ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
        
        <!-- Atalhos Rápidos -->
        <div class="dashboard-shortcuts">
            <h3>Atalhos Rápidos</h3>
            <a href="create_case.php" class="btn">Criar Novo Caso</a>
            <a href="add_lawyer.php" class="btn">Adicionar Advogado</a>
            <a href="add_client.php" class="btn">Adicionar Cliente</a>
        </div>

        <!-- Notificações Recentes -->
        <div class="dashboard-notifications">
            <h3>Notificações Recentes</h3>
            <ul>
                <!-- Exemplo de Notificações -->
                <li>Advogado X atualizou o Caso Y</li>
                <li>Documento Z foi adicionado ao Caso A</li>
            </ul>
        </div>
    </div>
</section>



</body>
</html>
