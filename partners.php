<?php $current_page = "Partners" ?>
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
					<li class="active">partners</li>
				</ul>
			</div> <!-- End Breadcrumbs -->

			<!-- Start Partners-page-block -->
			<div class="partners-page-block">
				<div class="container">
					<div class="row">

						<div class="text-wrap t-center">
							<h2><span class="orange-text">Our </span>General Sponsors</h2>
							<h4>Partnerships are good engines for narrative</h4>
						</div>

						<div class="sponsors-block t-center clearfix">
							<div class="col-md-12">
								<div class="carousel-wrap-sponsors owl-carousel owl-theme">
								<?php
											$sql = "select * from sponsors where sponsor_level__blazeweb = '1'";
											$result = $con->query($sql);
											if($result->num_rows>0){
												$c = 0;
												while($row = $result->fetch_assoc()){

										?>
									<div class="carousel-item-sponsor">

										<div class="car-img-wrap">
											<img width="315" height="168" class="img-sponsor<?php echo $c?>" src="img/partners/<?php echo $row["sponsor_image__blazeweb"] ?>" alt="sponsor">
										</div>

										<div class="car-text-wrap">
											<p><?php echo $row["sponsor_text__blazeweb"] ?></p>
										</div>

										<div class="car-btn-wrap">
											<a target="_blank" href="<?php echo $row["sponsor_url__blazeweb"]?>" class="btn btn-link-w">
												<span>visit our sponsor</span>
											</a>
										</div>

									</div>
												<?php }}?>
									<!-- End carousel-item-sponsor -->
								</div> <!-- End carousel-wrap-sponsors -->
							</div>
							

							<div class="col-md-12 padding-null clarfix">
								<div class="block-wrap-sponsor">
									<a href="#">WANT  TO SPONSOR US?</a>
								</div>
							</div>

						</div> <!-- End Sponsors-block -->

						<!-- Start Meet-partners-block -->
						<div class="meet-partners-block clearfix">

							<div class="text-wrap t-center">
								<h2><span class="orange-text">Meet </span>Our Partners</h2>
								<h4>Our best friends ever</h4>
							</div>

							<div class="all-partners-block-wrap">
							<?php
								$sql = "select * from sponsors";
								$result = $con->query($sql);
								if($result->num_rows>0){
									$c = 0;
									while($row = $result->fetch_assoc()){
							?>		
								<div class="col-md-4 col-sm-6">
									<a href="<?php echo $row["sponsor_url__blazeweb"]?>">
										<div class="img-wrap-partner">
											<img width="160" src="img/partners/<?php echo $row["sponsor_image__blazeweb"]?>" alt="partner">
										</div>
									</a>
								</div>
								<?php $c++; }}?>
								
							</div>
						</div> <!-- End Meet-partners-block -->

					</div> <!-- End Row -->
				</div> <!-- End Container -->
			</div> <!-- End Partners-page-block -->

		</section> <!-- End Page-->

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
