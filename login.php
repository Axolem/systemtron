<?php include('config/header.php');
include('config/navbar.php'); ?>

<main>
    <div id='login-form' class='login-page'>
        <div class="form-box">
            <div class='button-box'>
                <div id='btn'></div>
                <button type='button' onclick='login()' class='toggle-btn'>Log In</button>
                <button type='button' onclick='register()' class='toggle-btn'>Register</button>
            </div>
            <div id='loginTab' class='input-group-login'>
                <form class="login-form" action="manual/login.php" method="post">
                    <label class="no-margin" for="email">Email:</label>
                    <input type="email" name="email" required value=<?php if (!empty($_GET['email'])) {
                                                                        echo $_GET['email'];
                                                                    } ?>>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                    <a class="small-link" href="forgot-password.php">Forgot your password?</a>
                    <?php

                    if (!empty($_GET['loginErr'])) {
                        echo "<p class='error'>" . $_GET['loginErr'] . "</p> ";
                    } ?>
                    <button class="login-btn btn" type="submit">Login</button>
                </form>
                <div class="fb-goog">
                    <p>- Or login with -</p>
                    <div class="row">

                        <a class="col fb-goog-col" href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=232368183727-6k65oja7spelkrt3ebd34v1qcgus23i4.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Fproject%2Fsystemtron%2Fgoogle%2Fg_login.php&state&scope=profile%20email&approval_prompt=auto">
                            <div class="col "><i class="bi bi-google"></i></div>
                        </a>
                        <a class="col fb-goog-col" href="facebook/fb_login.php">
                            <div class="col "><i class="bi bi-facebook"></i></div>
                        </a>

                    </div>
                </div>
                <div class="small-text">
                    <p>*By logging in, you can access more educational content, view and learn more about
                        our partners and connect with other Entrepreneurs.</p>
                </div>

            </div>
            <form id='registerTab' class='input-group-register' action="manual/signup.php" method="post">
                <div class="reg-container">
                    <div class="row">
                        <div class="col reg-col">
                            <label class="no-margin" for="fname">First name:</label>
                            <input type="text" name="fname" id="" required value=<?php if (!empty($_GET['name'])) {
                                                                                        echo $_GET['name'];
                                                                                    } ?>>
                        </div>
                        <div class="col reg-col">
                            <label class="no-margin" for="lname">Last name:</label>
                            <input type="text" name="lname" required value=<?php if (!empty($_GET['lname'])) {
                                                                                echo $_GET['lname'];
                                                                            } ?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col reg-col">
                            <label for="email">Email:</label>
                            <input type="email" name="email" required value=<?php if (!empty($_GET['email'])) {
                                                                                echo $_GET['email'];
                                                                            } ?>>
                        </div>
                        <div class="col reg-col">
                            <label for="email">Confirm email:</label>
                            <input type="email" name="confirmEmail" required value=<?php if (!empty($_GET['cemail'])) {
                                                                                        echo $_GET['cemail'];
                                                                                    } ?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col reg-col">
                            <label for="color">Ethnic group:</label>
                            <select name="color" required value=<?php if (!empty($_GET['color'])) {
                                                                    echo $_GET['color'];
                                                                } ?>>
                                <option value="african">African</option>
                                <option value="coloured">Coloured</option>
                                <option value="white">White</option>
                                <option value="indian">Indian</option>
                                <option value="other">Prefer not to say</option>
                            </select>
                        </div>
                        <div class="col reg-col">
                            <label for="gender">Gender group:</label>
                            <select name="gender" required value=<?php if (!empty($_GET['gender'])) {
                                                                        echo $_GET['gender'];
                                                                    } ?>>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Prefer not to say</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col reg-col">
                            <label for="password">Password:</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="col reg-col">
                            <label for="password">Password:</label>
                            <input type="password" name="confirmPassword" required>
                        </div>
                    </div>
                    <div class="privacy">
                        <input type="checkbox" name="agree" required>
                        <label for="agree">I agree to the BOB <a href="">Privacy Policy </a>and<a href=""> Terms of Use</a> .</label>
                    </div>

                    <?php

                    if (!empty($_GET['inputErr'])) {
                        echo "<p class='error'>" . $_GET['inputErr'] . "</p> ";
                    } ?>
                    <button class="btn reg-btn" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>



</main>

<!-- This inserts the footer -->
<?php include('config/footer.php'); ?>
<!-- Do not add any content below this line. -->