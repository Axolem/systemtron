<?php include('config/header.php'); 
include('config/navbar.php'); ?>


    <!-- You code goes here. -->

    <div class="info">
<h2>CALL US</h2>
<P>+127 71 077 8009</P>
<p>(015)653 8779</p>
<h2>LOCATION</h2>
<p>18 Falcon Street,Auckland Park 2006 <br>Johannesburg 2092
</p>
</div>
 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Contact Form</title>
        <link rel="stylesheet" href="http://localhost/project//css/styles.css">
	</head>
	<body class="bc">
		<form class="contact" method="post" action="">
			<h1>Contact Form</h1>
			<div class="fields">
				<label for="email">
					<i class="E-mail"></i>
					<input id="email" type="email" name="email" placeholder="Your Email" required>
				</label><br>
				<label for="name">
					<i class="E-mail"></i>
					<input type="text" name="name" placeholder="Your Name" required>
				<label><br>
				<textarea class="E-mail" name="msg" placeholder="Message" required></textarea>
			</div>
      
			<input class="button" type="submit">
    
		</form>
	</body>
</html>

<!-- This inserts the footer -->
<?php include('config/footer.php') ?>
<!-- Do not add any content below this line. -->