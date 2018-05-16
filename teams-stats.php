<?php $current_page = "Teams" ?>
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
					<li class="active">teats and stats</li>
				</ul>
			</div> <!-- End Breadcrumbs -->

			<!-- Start Block Teams and Stats -->
			<div class="teams-stats-block block">
				<div class="container">
					<div class="row">

						<div class="text-wrap t-center">
							<h2><span class="orange-text">Teams </span>and Stats</h2>
							<h4>Our pride and hope</h4>
						</div>

						<div class="col-md-12">
							<div class="info-teams-stats-item">
								<div class="header-text">
									<div id="holder">
									<i class="icon-signs"></i>
									<h3>Players</h3>
									</div>
								</div>

								<div class="players-list-item" style="width:100%;">
									<table>
										<tr class="orange-text">
											<th>Jersey No.</th>
											<th >Name</th>
											<th>Position</th>
											<th>Height</th>
											<th>Weight</th>
										</tr>
										<?php
											$sql = "select * from team_players";
											$result = $con->query($sql);
											if($result->num_rows>0){
												while($row = $result->fetch_assoc()){

												
										
										
										?>
										<tr>
											<th class="t-center"><?php echo $row["player_jerseynumber__blazeweb"];?></th>
											<th><?php echo $row["player_firstname__blazeweb"]." ".$row["player_lastname__blazeweb"];?></th>
											<th><?php echo $row["player_positions__blazeweb"];?></th>
											<th><?php echo $row["player_height__blazeweb"];?>m</th>
											<th><?php echo $row["player_weight__blazeweb"];?>lbs</th>
										</tr>
												<?php }}?>
										
										
									</table>
									<!-- <a href="#">All Players</a>	 -->
								</div>
							</div> <!-- End info-teams-stats-item -->
						</div> <!-- End col -->

					</div> <!-- End Row -->
				</div> <!-- End Container -->
			</div> <!-- End Block Teams and Stats  -->

			<!-- Start Coaches Block -->
			<div class="block-Coaches clearfix t-white t-center">
				<div class="b-wrap-Coaches">
					<div class="container">
						<div class="row">

							<div class="col-md-12">
								<div class="text-wrap">
									<h2><span class="orange-text">Our </span>Coaches</h2>
									<p>Practice doesn’t make perfect, perfect practice makes perfect.</p>
								</div>
							</div>

							<div class="col-md-12">
								<div class="carousel-wrap-coaches owl-carousel owl-theme">

									<div class="carousel-item-coaches coaches-animated1">

										<div class="car-img-wrap">
											<img src="img/coaches/coach1.jpg" alt="icon-coaches">
										</div>

										<div class="car-text-wrap">
											<h4>Kylan Clark</h4>
											<h5 class="orange-text">Head Coach</h5>
											<p id="style-1"> I was born in Portsmouth, Virginia. My family moved from Virginia, Delaware and Illinois. I grew up in the Chicagoland area, an area where poverty and strife are common. Most of us who grew up there knew only one way out of the hood which was sports. In high school I excelled in multiple sports; basketball and soccer being my two favorites. I was blessed with the ability to play both sports on the collegiate level. After a recasting string of injuries I had to reevaluate the drawing board. <br><br>
I have always been a student of the game and I have always had a knack for teaching the game as well. I started to look into coaching the game and upon moving to Florida a few years ago, I started off assistant coaching at the local recreational facility for youth and eventually started coaching at Palm Beach Gardens High School as freshman assistant coach, then to JV as the head coach. <br><br>
Being a basketball player that has experienced the next level, I know and understand the dedication and work required as a student and an athlete to be successful. In the Florida Hornets program we require no less than a 2.5 GPA, excellent behavior in classes and high standards of practice and gameplay. I believe that upholding this standard of efficacy promotes the ability for youth to learn about the other options available to them as talented young men. Our future is not determined by our athletic ability, but the structure and camaraderie of team sports can help mold the future of your choice!</p>
											</div>

											<!-- <div class="car-btn-wrap">
												<a href="#" class="btn btn-link-o">
													<span>know more</span>
												</a>
											</div> -->

										</div> <!--End carousel-item-coaches -->

										<div class="carousel-item-coaches coaches-animated2">

											<div class="car-img-wrap">
												<img src="img/coaches/coach2.jpg" alt="icon-coaches">
											</div>

											<div class="car-text-wrap">
												<h4> Vinny Watkins</h4>
												<h5 class="orange-text">Assistant Coach</h5>
												<p id="style-1">I was born in Toledo, Ohio. I had a wonderful childhood full of great family and friends. My family holds very strong Christian values-to always honor God and grow his kingdom. Since I was 3 yrs old, I have always been on a basketball court helping my father coach; watching and learning everything I could from all types of players. I was a coaches son almost my whole life. Ive won championships in almost every year from fourth grade through a senior year. In high school I was an honor roll student and an all-state athlete. <br><br>
												I have coached all ages, both female and male teams. Basketball is close to my heart and has been a family sport. My father, mother, and sister were college basketball players. I’ve found so much joy in coaching and watching young men and women executing fundamentals and seeing those individuals grow up and become successful individuals in life and athletics. <br><br>
												Today I am a blessed man with a beautiful wife (Kate) and two beautiful children (Maddie, Dean) I truly have everything I have dreamed of. My success and stability in my life is the result of my walk with Christ. I’ve had many successes and failures both in athletics and definitely in life but the core of my purpose is to help others achieve greatness in life and glorify God’s kingdom.</p>
											</div>

											<!-- <div class="car-btn-wrap">
												<a href="#" class="btn btn-link-o">
													<span>know more</span>
												</a>
											</div> -->

										</div> <!--End carousel-item-coaches -->

									</div> <!-- End carousel-wrap-coaches -->
								</div> <!-- End col-md-12 -->

							</div>  <!-- End Row -->
						</div> <!-- End Container -->
					</div> <!-- End wrap-Coaches -->
				</div> <!-- End Coaches Block -->

				<!-- Start Statistic Block -->
				
			</section> <!-- End Page-Content-->

			<!-- Start Page-Footer -->
			<?php include "includes/footer.php" ?>

		</div> <!-- End Wrapper -->

		<div class="hidden"></div>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<script>
		// $(".svg-bb").mouseenter(function(){
		// 	$(".svg-bb svg path").attr("fill","#fff");
		// });
		// $(".svg-bb").mouseleave(function(){
		// 	$(".svg-bb svg path").attr("fill","#007691");
		// });
		
	</script>
		<!-- Load Scripts End -->

		<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
</body>
</html>
