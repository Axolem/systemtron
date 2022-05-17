<?php include('config/header.php');
include('config/navbar.php'); ?>

<div class="contact-container">
	<div class="contact-wrapper row">
		<div class="contact-info">
			<div class="contact-info-content">
				<h2 class="contact-h2">CALL US</h2>
				<table class="contact-info-table">
					<tr>
						<td><i class="bi bi-envelope"></i></td>
						<td><a class="link" href="mailto:beyourownbossdsw@gmail.com">beyourownbossdsw@gmail.com</a></td>
					</tr>
					<tr>
						<td><i class="bi bi-telephone-inbound"></i></td>
						<td><a class="link" href="tel:+27653 8779">+27 (015)653 8779</a></td>
					</tr>
					<tr>
						<td><i class="bi bi-geo-alt"></i></td>
						<td><a class="link" href="https://goo.gl/maps/mJycrvBZHnszFjwi7">18 Falcon Street, Auckland Park 2006 Johannesburg 2092</a></td>
					</tr>
				</table>
				<i class="bi bi-telephone-outbound"></i>
			</div>

		</div>
		<div class="contact-info">
			<div class="contact-info-content">
				<h2 class="contact-h2">Leave an eamil</h2>
				<form class="contact" method="post" action="">
					<table class="contact-info-table">
						<tr>
							<td><input class="form-input" id="email" type="email" name="email" placeholder="Your Email" required></td>
						</tr>
						<tr>
							<td><input class="form-input" type="text" name="name" placeholder="Your Name" required></td>
						</tr>
						<tr>
							<td><textarea class="form-input" class="E-mail" rows=6 name="msg" placeholder="Message" required></textarea></td>
						</tr>
						<tr>
							<td><input class="button" class="button" type="submit" name="submit"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>

	</div>
</div>

<!-- This inserts the footer -->
<?php include('config/footer.php') ?>
<!-- Do not add any content below this line. -->