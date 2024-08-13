<?php
// Defina a senha que você quer hashear
$password = 'Life0852!';

// Gere o hash da senha usando PASSWORD_BCRYPT
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Exiba o hash gerado
echo "Hashed Password: " . $hashed_password;
// INSERT INTO lawyers (name, email, password, is_admin) VALUES ('Admin Master', 'admin@example.com', '$2y$10$E9yHlGgS8zY.kQ0zHFpJmOMvxJ9TPd8k7rWQX/7CZ7NhxZdiNY0Cm', 1);
?>

