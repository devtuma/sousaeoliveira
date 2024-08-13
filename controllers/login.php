<?php

// Ativa a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Primeiro, verifica se o usuário é um advogado
    $sql = "SELECT id, name, title, password FROM lawyers WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_title'] = $row['title'];
            $_SESSION['user_role'] = 'lawyer';
            $_SESSION['is_logged_in'] = true;

            header("Location: ../views/dashboard.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        // Se não for advogado, verifica se é um cliente
        $sql = "SELECT id, name, title, password FROM clients WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_title'] = $row['title'];
                $_SESSION['user_role'] = 'client';
                $_SESSION['is_logged_in'] = true;

                header("Location: ../views/client_dashboard.php");
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Nenhum usuário encontrado com este email.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
