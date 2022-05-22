<?php
session_start();
include 'config/header.php';
include 'config/navbar.php';
?>
<center>
    <div class="confirm-email">
        <form class="login-form conf-form" action="forgot-password/resetpassword.php" method="post">
            <h3>Reset Password</h3>
            <label for="email">Email:</label>
            <input type="email" name="email" required ?>
            <?php

            if (!empty($_GET['inputErr'])) {
                echo "<p class='error'>" . $_GET['inputErr'] . "</p> ";
            } ?>
            <button class="login-btn btn conf-btn" type="submit">Reset</button>
        </form>
    </div>
</center>

<?php include 'config/footer.php'; ?>