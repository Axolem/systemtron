<?php
session_start();
include '../config/header.php';
include '../config/navbar.php';
?>
<center>
<div class="confirm-email">
    <form class="login-form conf-form" action="confirmEmail.php" method="post">
        <p>Enter the code you received.</p>
        <label for="email">Email:</label>
        <input type="email" name="email" required value=<?php if (!empty($_SESSION['email'])) {echo $_SESSION['email'];} ?>>
        <label for="password">Code:</label>
        <input type="number" name="code" required>
        <?php

        if (!empty($_GET['codeErr'])) {
            echo "<p class='error'>" . $_GET['codeErr'] . "</p> ";
        } ?>
        <button class="login-btn btn conf-btn" type="submit">Confirm</button>
    </form>
</div>
</center>

<?php include '../config/footer.php'; ?>