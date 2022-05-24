<?php
//initialize facebook sdk
require '../dashboard/facebook/vendor/autoload.php';
include('../config/header.php');
include('../config/navbar.php');
include('../config/db_connect.php');
include('..//manual/functions.php');
session_start();
$fb = new Facebook\Facebook([
    'app_id' => '439479227947560',
    'app_secret' => '6543c5194252624b1d229025d1f1a40c',
    'default_graph_version' => 'v2.5',
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional
try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch (Facebook\Exceptions\facebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}
if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        // getting short-lived access token
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        // setting default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    // redirect the user to the profile page if it has "code" GET variable
    if (isset($_GET['code'])) {
        header('Location: http://localhost/project/systemtron/dashboard/index.php');
    }
    // getting basic info about user
    try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
        $requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
        $picture = $requestPicture->getGraphUser();
        $profile = $profile_request->getGraphUser();
        $id = $profile->getProperty('id');           // To Get Facebook ID
        $fname = $profile->getProperty('first_name');   // To Get Facebook first name
        $lname = $profile->getProperty('last_name'); // To Get Facebook Last name
        $gender = $profile->getProperty('gender'); // To Get Facebook user gender
        $email = $profile->getProperty('email'); //  To Get Facebook email
        $pic = $picture['url'];
        $password = $_SESSION['facebook_access_token'];
        $email_id = uniqid();
        $date = date("l jS \of F Y h:i:s A");

        if (empty($email)) {
            header('Location: http://localhost/project/systemtron/facebook/fb_login.php?loginErr=Account does not have an email. Try other methods.');
            die();
        }

        $sql = "SELECT email FROM users WHERE oath_provider = 'facebook'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $query = "UPDATE user_details SET first_name = '$fname', last_name = '$lname',
            picture = '$pic' WHERE usersemail = '$email' ";
            if (mysqli_query($con, $query)) {
                $subject = "Hey boss! New login";
                $message = "There was a login into you account at $date";

                sendEmail($email, $subject, $message);

                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $email;
                header('Location: ../dashboard/index.php');
            }
        } else {

            # save the user information database
            $query = "INSERT INTO users (`id`, `oath_provider`, `oath_id`, `email`, `created`, `verified`) 
            VALUES ('$id','facebook','$password', '$email', NULL, 'yes')";

            $query2 = "INSERT INTO user_details (`usersemail`, `first_name`, `last_name`, `gender`, `picture`) 
                                        VALUES ('$email','$fname','$lname','$gender','$pic')";

            //Insert user default settings
            $query3 = "INSERT INTO user_setting (`usersemail`) VALUES ('$email')";

            //isert user doe email notifications
            $query4 = "INSERT INTO newsletters (`id`, `email_id`, `name`, `email`) VALUES ('$id','$email_id','$fname','$email')";


            //Send  the query to the database
            if (
                mysqli_query($con, $query) &&
                mysqli_query($con, $query2) &&
                mysqli_query($con, $query3) &&
                mysqli_query($con, $query4)
            ) {

                $subject = "Hey boss! Welcome";
                $message = "Welcome to BOB $name";
                sendEmail($email, $subject, $message);

                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $email;;
                header('Location: ../dashboard/index.php');
            }
        }
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // redirecting user back to app login page
        header("Location: ../login.php");
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
} else {
    // replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used            
    $loginUrl = $helper->getLoginUrl('http://localhost/project/systemtron/facebook/fb_login.php', $permissions);
}
?>
<div class="fb-holder">
    <div class="fb-wapper">
        <h2>You are about to log in with Facebook.</h2>
        <p>Continue?</p>
        <?php echo '<a href="' . $loginUrl . '"><img src="https://i.stack.imgur.com/oL5c2.png" alt=""></a>' ?>
        <?php
        if (!empty($_GET['loginErr'])) {
            echo "<p class='error'>" . $_GET['loginErr'] . "</p> ";
        } ?>
    </div>
</div>

<?php include('../config/footer.php') ?>