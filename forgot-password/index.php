<?php
session_start();
include '../config/header.php';
include '../config/navbar.php';
?>
<center>
    <div class="confirm-email">
        <form class="login-form conf-form" action="updatepassword.php" method="post">
            <p>Enter the code you received.</p>
            <label for="code">Code:</label>
            <input type="number" name="code" required>
            <label for="pass">New Password</label>
            <input type="password" name="pass" required>
            <label for="cpass">Confirm Password</label>
            <input type="password" name="cpass" required>
            <?php

            if (!empty($_GET['codeErr'])) {
                echo "<p class='error'>" . $_GET['codeErr'] . "</p> ";
            } ?>
            <button class="login-btn btn conf-btn" type="submit">Confirm</button>
        </form>
    </div>
</center>

<?php include '../config/footer.php'; ?>