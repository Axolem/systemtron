<?php
//initialize facebook sdk
require '../dashboard/facebook/vendor/autoload.php';
include('../config/header.php');
include('../config/navbar.php');
include('../config/db_connect.php');
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
        $fbid = $profile->getProperty('id');           // To Get Facebook ID
        $fname = $profile->getProperty('first_name');   // To Get Facebook first name
        $lname = $profile->getProperty('last_name'); // To Get Facebook Last name
        $gender = $profile->getProperty('gender'); // To Get Facebook user gender
        $email = $profile->getProperty('email'); //  To Get Facebook email
        $fbpic = $picture['url'];
        $password = $_SESSION['facebook_access_token'];
        $date = date('Y-m-d');

        # save the user nformation database
        $query = "INSERT INTO `users`(`id`, `oauth_provider`, `oauth_id`, `first_name`, `last_name`, `email`, `picture`, `created_at`, `gender`, `verified`) 
				VALUES (' ','facebook','$password','$fname','$lname','$email', '$fbpic' ,'$date','$gender','yes')";
        //Send  the query to the database
        mysqli_query($con, $query);
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // redirecting user back to app login page
        header("Location: ./");
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
    </div>
</div>

<?php include('../config/footer.php') ?>