<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'lawyer') {
    header("Location: login.php");
    exit();
}

// Aqui você pode adicionar lógica para exibir informações do advogado, clientes e casos
?>

<!-- Inclui o cabeçalho -->
<?php include '../header.php'; ?>

<section id="dashboard">
    <div class="container">
        <h2>Bem-vindo ao Dashboard, <?php echo $_SESSION['user_title'] . ' ' . $_SESSION['user_name']; ?></h2>
        <p>Aqui você pode gerenciar seus clientes e casos.</p>
        <!-- Adicione aqui a lógica para exibir informações do advogado, clientes e casos -->
    </div>
</section>

<?php
// Inclui o rodapé
include '../footer.php';
?>
