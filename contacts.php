<?php $current_page = "Contacts" ?>
<?php include "includes/head.php"?>

<body class="Pages">
	<!-- preloader -->
	<div class="pl">
		<div class="round1 anti"></div>
		<div class="pl_r"></div>
		<div class="pl_l"></div>
	</div>


	<div class="wrapper">
		<?php include "includes/header.php"?>

		<!-- Start Page-Content -->
		<section id="page-content" >

			<!-- Start Breadcrumbs -->
			<div class="breadcrumbs">
				<ul class="breadcrumb t-center">
					<li><a href="index.php">home</a></li>
					<li class="active">contacts</li>
				</ul>
			</div> <!-- End Breadcrumbs -->

			<div class="page-contacts-block">
				<div class="container">
					<div class="row">

						<div class="text-wrap t-center">
							<h2>Contacts</h2>
						</div>

						<div class="col-md-8 col-md-push-4">
							<div class="message-wrap">
								<h3>Leave Your Message</h3>
								
								<!-- form-block -->
								<form id="contactform" class="boxed-form" name="contactform" method="post" novalidate="novalidate" action="mail.php">
									<div id="success">
										<p>Your message was sent successfully!</p>
									</div>
									<div id="error">
										<p>Something went wrong, try refreshing and submitting the form again.</p>
									</div>

									<!-- Hidden Required Fields -->
									<input type="hidden" name="project_name" value="Site Name">
									<input type="hidden" name="admin_email" value="abrehman1994@gmail.com">
									<input type="hidden" name="form_subject" value="Some subject">
									<!-- END Hidden Required Fields -->

									<div class="form-group">
										<input type="text" class="form-control" value="" name="First_name" placeholder="First name" required>
									</div>

									<div class="form-group">
										<input type="text" class="form-control" value="" name="Last_name" placeholder="Last name" required>
									</div>

									<div class="form-group">
										<input type="text" class="form-control" value="" name="email" placeholder="Email" required>
									</div>

									<div class="form-group">
										<textarea name="message" rows="10" placeholder="Message" class="form-control"></textarea>
									</div>

									<button class="btn btn-link-w" type="submit" id="submit"><span>leave a message</span></button>
								</form>

							</div> 
						</div>

						<div class="col-md-4 col-md-pull-8 padding-null">
							<div class="contact-info-wrap">
								<h3>Contact Info</h3>

								<p><span class="orange-text">Florida Hornets Basketball </span>
											<br>10106 Plant Dr.
											<br>Palm Beach Gardens,
											<br>FL 33410
										</p>
								<p>Email 1: <br><a href="#">kclark@fhbasketball.com</a></p>
								<p>Email 2: <br><a href="#">Vinny.watkins@fhbasketball.com</a></p>
								<!-- <p>Press/Media: <br><a href="#">press@fhbasketball.com</a></p>
								<p>Sponsorship: <br><a href="#">sponsorship@fhbasketball.com</a></p> -->
								<div class="number-block">
									<p>Call us:</p>
									<p class="number">1-561-951-6848</p>
								</div>

								<div class="icon-wrap">

									<p>Be in touch:</p>

									<a href="https://www.facebook.com/" target="_blank">
										<div class="circle-border">
											<i class="icon-facebook"></i>
										</div>
									</a>

									<a href="https://twitter.com/" target="_blank">
										<div class="circle-border">
											<i class="icon-twitter-logo-silhouette"></i>
										</div>
									</a>

									<a href="https://www.instagram.com/" target="_blank">
										<div class="circle-border">
											<i class="icon-instagram-symbol"></i>
										</div>
									</a>

									<a href="https://ru.pinterest.com/" target="_blank">
										<div class="circle-border">
											<i class="icon-pinterest-logo"></i>
										</div>
									</a>

								</div> <!-- End Icon-wrap -->

							</div>
						</div>

					</div> <!-- End Row -->
				</div> <!-- End Container -->
			</div> <!-- End Page-contacts-block -->




		</section> <!-- End Page-Content-->

		<!-- Start Page-Footer -->
		<?php include "includes/footer.php" ?>

	</div> <!-- End Wrapper -->

	<div class="hidden"></div>

	<!-- Load Scripts Start -->
	<script src="js/libs.js"></script>
	<script src="js/common.js"></script>
	<!-- Load Scripts End -->

		<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->

</body>
</html>
