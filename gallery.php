<?php $current_page = "Gallery" ?>
<?php include "includes/head.php"?>

<body class="Pages gallery-W">
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
					<li class="active">Photo&video</li>
				</ul>
			</div> <!-- End Breadcrumbs -->

			<!-- Start Club Gallery Block -->
			<div class="block-Club-Gallery clearfix t-black t-center">
				<div class="b-wrap-club-gallery">
					<div class="container-fluid">
						<div class="row">

							<div class="col-md-12">
								<div class="text-wrap">
									<h2><span class="orange-text">Our Club </span>Gallery</h2>
									<p>Victory begins in the Heart</p>
								</div>
							</div>

							<div class="col-md-12">
								<div class="filters-by-category">
									<ul class="option-set" data-option-key="filter">
										<li><a class="btn btn-link-g selected" href="#filter" data-option-value="*"><span>All Photos</span></a></li>
										<li><a class="btn btn-link-g" href="#filter" data-option-value=".category1"><span>Game</span></a></li>
										<li><a class="btn btn-link-g" href="#filter" data-option-value=".category2"><span>Players</span></a></li>
										<li><a class="btn btn-link-g" href="#filter" data-option-value=".category3"><span>Faculty &amp; Staff</span></a></li>
										<li><a class="btn btn-link-g" href="#filter" data-option-value=".category4"><span>Others</span></a></li>
									</ul>
								</div>
							</div>

							<div class="col-md-12 gallery-m">
								<div id="gallery" class="gallery gallery-isotope clearfix">

									
								<?php 
									$sql = "select * from gallery order by gallery_id__blazeweb desc limit 6";
									$result = $con->query($sql);
									$c = 0;
									if($result->num_rows>0){
										while($row=$result->fetch_assoc()){
											if($c>=6){break;}
											$c++;
											$image_name = $row["gallery_image__blazeweb"];
											$image_text = $row["gallery_text__blazeweb"];
								?>
										<div class="gallery__item category1">
											<div class="gallery__item__img">
												<div class="gallery-img-holder"><img src="img/clubGallery/<?php echo $image_name?>" alt="gc"></div>
												
												<a class="hover-link-g mfp-gallery" href="img/clubGallery/<?php echo $image_name?>">
													<div class="inside">
														<i class="icon-cross"></i>
														<p><?php echo $image_text?></p>
													</div>	
												</a>
											</div>
										</div>
								<?php
									//closing the while loop	
									}}
								?>
								</div> <!-- End gallery-isotope -->
							</div> <!-- End block gallery-m -->

							<div class="col-md-12">
								<div class="btn-wrap-gallery">
									<a href="#" class="btn btn-link-w">
										<span>view all gallery</span>
									</a>
								</div>
							</div>

						</div>  <!-- End Row -->
					</div> <!-- End Container -->
				</div> <!-- End wrap-Club-Gallery -->
			</div> <!-- End Club-Gallery Block -->

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
