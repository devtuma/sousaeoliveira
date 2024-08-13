<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

if (!isset($_SESSION['lawyer_id']) || !$_SESSION['is_admin']) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

// Função para gerar número de conta automaticamente
function generateAccountNumber() {
    return uniqid('SOA_'); // Prefixo único para Sousa e Oliveira Advogados
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];
    $observation = $_POST['observation'];
    $title = $_POST['title'];
    $account_number = generateAccountNumber();

    if ($role == 'lawyer') {
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;
        $sql = "INSERT INTO lawyers (name, email, password, phone, observation, title, account_number, is_admin) VALUES ('$name', '$email', '$password', '$phone', '$observation', '$title', '$account_number', '$is_admin')";
    } else if ($role == 'client') {
        $sql = "INSERT INTO clients (name, email, phone, observation, title, account_number) VALUES ('$name', '$email', '$phone', '$observation', '$title', '$account_number')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Conta criada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Inclui o cabeçalho
include '../header.php';
?>

<section id="admin">
    <div class="container">
        <h2 class="section-title">Administração</h2>
        <form action="admin.php" method="post">
            <label for="role">Tipo de Conta:</label>
            <select id="role" name="role" required>
                <option value="lawyer">Advogado</option>
                <option value="client">Cliente</option>
            </select>
            <br>
            <label for="title">Título:</label>
            <select id="title" name="title" required>
                <option value="Dr.">Dr.</option>
                <option value="Dra.">Dra.</option>
                <option value="Sr.">Sr.</option>
                <option value="Sra.">Sra.</option>
                <option value="Excelentíssimo">Excelentíssimo</option>
                <option value="Excelentíssima">Excelentíssima</option>
                <!-- Adicione mais títulos conforme necessário -->
            </select>
            <br>
            <label for="name">Nome Completo:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="phone">Telefone:</label>
            <input type="text" id="phone" name="phone" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="observation">Observações:</label>
            <textarea id="observation" name="observation" rows="4"></textarea>
            <br>
            <div id="additional-lawyer-fields">
                <label for="is_admin">Administrador:</label>
                <input type="checkbox" id="is_admin" name="is_admin">
                <br>
            </div>
            <button type="submit" class="btn">Criar Conta</button>
        </form>
    </div>
</section>

<?php
// Inclui o rodapé
include '../footer.php';
?>
