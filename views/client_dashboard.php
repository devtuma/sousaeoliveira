<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'client') {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$client_id = $_SESSION['user_id'];
$sql = "SELECT image_path, description FROM images WHERE client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- Inclui o cabeçalho -->
<?php include '../header.php'; ?>

<section id="client_dashboard">
    <div class="container">
        <h2>Bem-vindo ao Dashboard, <?php echo $_SESSION['user_title'] . ' ' . $_SESSION['user_name']; ?></h2>
        <p>Aqui você pode visualizar seus casos e documentos relacionados.</p>
        
        <h3>Documentos e Imagens:</h3>
        <div class="image-gallery">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="image-item">';
                    echo '<img src="../uploads/' . $row['image_path'] . '" alt="Imagem do documento">';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhuma imagem encontrada.</p>";
            }
            ?>
        </div>
    </div>
</section>

<?php
// Inclui o rodapé
include '../footer.php';
?>
