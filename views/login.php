<?php
header('Content-Type: text/html; charset=utf-8');
?>

<?php include '../header.php'; ?>

<main>
    <section id="login">
        <div class="container">
            <h2>Login</h2>
            <form action="../controllers/login.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </section>
</main>

<?php include '../footer.php'; ?>
