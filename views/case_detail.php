<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['lawyer_id']) && !isset($_SESSION['client_id'])) {
    header("Location: login.php");
    exit();
}

// Lógica para buscar os detalhes do caso e exibi-los

?>

// Inclui o cabeçalho
<?php include '../header.php';
?>

        <section id="case_detail">
            <div class="container">
                <h2>Detalhes do Caso</h2>
                <p>Informações detalhadas do caso...</p>
                <!-- Adicione aqui a lógica para exibir os detalhes do caso -->
            </div>
        </section>

<?php
// Inclui o rodapé
include '../footer.php';
?>
