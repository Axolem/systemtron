<?php include('config/header.php');
include('config/navbar.php'); ?>

<main>
    <div class="login-container">
        <div class="row login-row">
            <div class="col login-col">
                <h2>
                    <center>LOGIN</center>
                </h2>
                <?php if (!empty($errors)) {
                    echo "<p class='error'> <!--this is where the errors will be displayed--></p> ";
                } ?>
                <form class="login-form" action="" method="post">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                    <a class="small-link" href="">Forgot your password?</a>
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
            <div class="col register-col">
                <h2>
                    <center>REGISTER</center>
                </h2>
                <form class="reg-form" action="" method="post">
                    <div class="reg-container">
                        <div class="row">
                            <div class="col reg-col">
                                <label for="fname">First name:</label>
                                <input type="text" name="fname" id="" required>
                            </div>
                            <div class="col reg-col">
                                <label for="lname">Last name:</label>
                                <input type="text" name="lname" id="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col reg-col">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="" required>
                            </div>
                            <div class="col reg-col">
                                <label for="email">Confirm email:</label>
                                <input type="email" name="confirmEmail" id="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col reg-col">
                                <label for="color">Ethnic group:</label>
                                <select name="color" required>
                                    <option value="african">African</option>
                                    <option value="coloured">Coloured</option>
                                    <option value="white">White</option>
                                    <option value="indian">Indian</option>
                                    <option value="other">Prefer not to say</option>
                                </select>
                            </div>
                            <div class="col reg-col">
                                <label for="gender">Gender group:</label>
                                <select name="color" required>
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

                        <?php if (!empty($errors)) {
                            echo "<p class='error'> <!--this is where the errors will be displayed--></p> ";
                        } ?>



                        <button class="btn reg-btn" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>




<!-- This inserts the footer -->
<?php include('config/footer.php'); ?>
<!-- Do not add any content below this line. -->