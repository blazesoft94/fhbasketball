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
				<div class="statistic-block">
					<div class="container padding-null">
						<div class="row">

							<div class="text-wrap t-center">
								<h2><span class="orange-text">Statistic </span>About Us</h2>
								<h4>Keep the Dream Alive</h4>
							</div>

							<div class="col-md-3 col-sm-6 padding-null svg-bb">
								<div class="statistic-wrap-content t-center">
									<div class="icon">
									<svg width="100" height="100" viewBox="0 -10 240 250" xmlns="http://www.w3.org/2000/svg"  fill-rule="evenodd" clip-rule="evenodd"><path fill="#007691" d=" M 114.27 0.00 L 123.50 0.00 C 132.02 0.50 140.37 2.29 148.78 3.56 C 151.63 4.51 154.34 5.84 157.20 6.76 C 184.25 16.01 207.55 35.67 221.27 60.75 C 230.15 76.51 234.99 94.40 236.00 112.44 L 236.00 120.75 C 235.17 146.16 226.04 171.28 210.00 191.03 C 188.43 218.10 154.39 234.62 119.79 235.00 L 112.45 235.00 C 85.80 233.43 59.61 223.18 39.63 205.34 C 15.72 184.40 1.15 153.36 0.00 121.62 L 0.00 111.58 C 0.54 106.00 1.10 100.40 2.25 94.90 C 7.34 68.63 21.78 44.34 42.38 27.28 C 62.45 10.53 88.17 0.89 114.27 0.00 M 78.11 11.83 C 88.82 14.24 98.79 19.15 107.99 25.04 C 123.04 34.68 136.41 46.62 150.98 56.93 C 164.31 66.62 179.85 75.15 196.82 74.71 C 194.16 54.30 185.23 34.12 169.47 20.48 C 163.40 15.49 156.78 10.67 148.96 8.95 C 125.83 2.32 100.62 3.35 78.11 11.83 M 70.21 15.23 C 36.83 30.18 12.12 62.59 6.27 98.68 C 8.75 95.75 12.16 93.88 15.58 92.28 C 29.82 85.99 45.67 85.31 61.00 84.88 C 81.65 84.91 102.25 86.95 122.64 90.12 C 148.02 94.31 173.30 99.62 197.73 107.77 C 198.64 98.12 198.46 88.40 197.53 78.77 C 189.57 79.08 181.63 77.57 174.19 74.78 C 157.80 68.43 144.10 57.12 130.36 46.47 C 115.68 35.18 100.86 23.16 82.98 17.39 C 78.83 16.36 74.50 14.70 70.21 15.23 M 175.07 19.94 C 189.87 34.26 198.21 54.13 201.02 74.30 C 207.75 73.63 214.00 70.99 220.16 68.37 C 210.23 48.30 194.48 31.17 175.07 19.94 M 219.90 69.21 C 220.38 70.28 220.91 71.33 221.47 72.37 C 215.09 75.04 208.58 77.62 201.65 78.42 C 202.68 88.63 202.70 98.92 201.82 109.14 C 212.09 112.92 222.75 116.72 231.21 123.89 C 232.15 106.92 229.22 89.76 222.65 74.08 C 221.76 72.49 222.12 69.63 219.90 69.21 M 22.86 93.86 C 16.55 96.05 9.77 99.02 6.29 105.07 C 4.24 107.95 4.90 111.62 4.68 114.93 C 4.06 136.58 10.13 158.26 21.44 176.68 C 35.88 178.61 50.49 176.20 64.50 172.74 C 93.83 165.16 121.09 151.53 149.93 142.49 C 163.22 138.70 178.02 135.18 191.33 140.76 C 194.18 131.33 196.17 121.64 197.30 111.86 C 184.73 107.69 171.90 104.36 159.02 101.32 C 130.58 94.97 101.67 90.31 72.51 89.22 C 55.90 88.89 38.88 88.88 22.86 93.86 M 195.22 143.04 C 207.34 151.01 210.79 166.35 212.60 179.81 C 222.32 164.90 228.74 147.76 230.59 130.03 C 229.71 127.59 227.42 126.03 225.44 124.51 C 218.09 119.52 209.61 116.61 201.47 113.22 C 200.06 123.30 197.70 133.20 195.22 143.04 M 152.89 145.93 C 121.20 155.60 91.43 171.12 58.95 178.27 C 47.59 180.66 35.93 182.18 24.32 181.14 C 42.59 207.91 72.79 226.13 105.03 229.60 C 113.29 228.85 121.39 226.47 128.89 222.94 C 145.83 214.94 159.46 201.28 170.04 186.04 C 178.63 173.28 185.55 159.31 189.99 144.58 C 178.05 139.81 164.82 142.59 152.89 145.93 M 193.70 146.94 C 186.47 168.75 175.09 189.46 159.02 206.00 C 148.68 216.68 136.11 225.26 122.07 230.27 C 155.86 229.34 188.73 212.17 208.85 185.00 C 207.64 171.45 205.30 155.73 193.70 146.94 Z"/></svg>
									</div>
									<h3>15</h3>
									<h4>Acting Players</h4>
								</div> <!-- End Statistic-wrap-content -->
							</div> <!-- End col -->

							<div class="col-md-3 col-sm-6 padding-null">
								<div class="statistic-wrap-content t-center">
									<div class="icon">
										<i class="icon-sports-2"></i>
									</div>
									<h3>2</h3>
									<h4>Coaches</h4>
								</div> <!-- End Statistic-wrap-content -->
							</div> <!-- End col -->

							<div class="col-md-3 col-sm-6 padding-null"> 
								<div class="statistic-wrap-content t-center">
									<div class="icon">
										<svg width="100" height="100" viewBox="-15 0 240 180" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="#451d4cff"><path fill="#007691" opacity="1.00" d="m6.400535,4.488346c3.416786,-3.052728 8.080457,-3.087616 12.290715,-3.227169c55.105802,0.226774 110.227796,-0.034888 165.317405,0.122109c7.610851,-0.436104 14.881643,6.489227 14.638744,14.862423c0.453412,9.105851 -9.116828,12.699348 -11.772529,20.374777c-4.145485,10.885155 -7.481305,22.101749 -11.57821,33.004348c-2.607121,7.657986 -6.283001,15.106642 -6.81738,23.375173c-0.550572,35.115092 0.680119,70.282516 -0.631539,105.380163c-3.23866,0.174442 -6.882153,-0.20933 -9.133021,-3.052728c-5.716235,-6.54156 -10.962864,-13.536667 -16.500973,-20.235224c-6.704026,7.88476 -12.387875,16.955722 -20.160659,23.706612c-3.497753,-0.313995 -5.797202,-3.52372 -8.031877,-6.035679c-4.76083,-5.826349 -9.440694,-11.739919 -14.233911,-17.53138c-6.509707,7.448656 -11.950656,16.06607 -19.189061,22.729739c-2.348029,2.075855 -4.793217,-0.41866 -6.42874,-2.215408c-5.878168,-6.524115 -11.124797,-13.658776 -16.760066,-20.409666c-5.635269,6.559004 -10.881898,13.501779 -16.549553,20.043338c-1.748876,1.674639 -3.934972,4.552925 -6.493513,2.860842c-3.837812,-0.854764 -2.623315,-6.088011 -3.19008,-9.193072c0.04858,-30.300504 -0.064773,-60.601008 0.113353,-90.901511c0.550572,-12.891233 -5.926748,-24.229937 -9.635014,-36.057076c-3.125307,-8.425529 -5.667655,-17.095276 -8.938702,-25.468472c-2.137516,-5.965902 -7.691818,-9.210516 -10.655192,-14.565873c-2.542348,-5.983346 -0.599152,-13.711109 4.339805,-17.566268m15.254089,26.951225c4.517931,13.850662 9.294954,27.596659 14.476811,41.168215c5.10089,-13.589 9.926493,-27.282664 14.412037,-41.115882c-9.61882,-0.261662 -19.253834,-0.279107 -28.888848,-0.052332m42.377867,-0.034888c4.663671,13.728553 9.392114,27.457106 14.363458,41.080994c5.521915,-13.432002 9.9103,-27.334997 14.833063,-41.011217c-9.732174,-0.261662 -19.464347,-0.244218 -29.196521,-0.069777m42.313094,0.052332c4.987537,13.658776 9.327341,27.596659 14.86545,41.011217c4.987537,-13.606444 9.748367,-27.300109 14.331071,-41.080994c-9.732174,-0.139553 -19.464347,-0.139553 -29.196521,0.069777m42.766507,0.034888c4.534124,13.79833 9.100635,27.579215 14.557777,40.993773c4.971343,-13.589 9.748367,-27.26522 14.314878,-41.028661c-9.635014,-0.244218 -19.253834,-0.20933 -28.872655,0.034888m-91.89698,12.158579c-5.489529,14.356543 -10.282746,29.009636 -15.448409,43.505732c5.117083,6.402006 10.315132,12.75168 15.658922,18.961801c4.841797,-6.245009 10.736158,-11.705031 14.493004,-18.822247c0.19432,-2.756177 -0.793472,-5.390245 -1.57075,-7.954536c-4.275031,-11.949249 -8.29097,-24.003162 -13.132767,-35.690749m30.119539,34.242884c-0.906825,3.070172 -2.364222,6.175232 -2.072742,9.472178c3.659686,7.221882 9.537854,12.734236 14.412037,18.979245c4.922763,-6.314785 10.800931,-11.879472 14.784483,-18.979245c-0.080967,-3.767938 -1.47359,-7.291658 -2.639508,-10.78049c-4.032132,-11.077041 -7.821364,-22.258747 -12.031622,-33.266011c-4.339805,11.443368 -8.307163,23.061178 -12.452648,34.574323m41.924455,1.447865c-0.761085,2.564291 -1.781263,5.198359 -1.554557,7.937092c3.870199,7.291658 9.877913,12.873789 14.752097,19.345572c4.679864,-6.907887 12.047816,-12.472574 14.493004,-20.618996c-3.724459,-14.478652 -9.570241,-28.294426 -14.557777,-42.336973c-4.793217,11.722475 -8.873929,23.7415 -13.132767,35.673305m-65.388547,34.888318c4.777024,6.192676 9.635014,12.298132 14.735903,18.194258c4.793217,-5.843793 9.602627,-11.705031 14.493004,-17.461603c-4.728444,-6.297341 -9.554047,-12.524906 -14.541584,-18.578029c-4.90657,5.931014 -9.748367,11.949249 -14.687324,17.845374m43.252306,0.069777c2.623315,7.518432 9.311148,12.769124 13.812885,19.153686c4.777024,-5.948458 10.315132,-11.321259 14.104365,-18.107037c-2.866214,-7.570765 -9.408308,-12.716792 -14.055785,-19.031577c-4.598897,6.000791 -10.10462,11.286371 -13.861465,17.984928m-65.858153,-11.356147c-0.307673,7.553321 -0.307673,15.124086 0.080967,22.677406c3.173887,-3.785382 6.363967,-7.588209 9.732174,-11.181706c-3.352013,-3.750494 -6.590673,-7.623097 -9.81314,-11.495701m107.442549,11.40848c3.319627,3.628385 6.461127,7.448656 9.489274,11.373592c0.469606,-7.274214 0.453412,-14.565873 0.04858,-21.840087c-3.076727,3.593497 -6.218227,7.134661 -9.537854,10.466495m-105.968958,26.166238c4.793217,6.245009 9.570241,12.490018 14.57397,18.543141c5.00373,-6.070567 9.845527,-12.280688 14.752097,-18.421032c-4.987537,-5.948458 -9.845527,-12.019025 -14.67113,-18.107037c-4.874183,6.018235 -9.748367,12.001581 -14.654937,17.984928m99.766924,-17.6186c-4.922763,6.035679 -9.635014,12.245799 -14.347264,18.473364c4.663671,5.931014 9.392114,11.792251 14.104365,17.670933c5.019923,-6.035679 9.845527,-12.228355 14.606357,-18.490808c-4.793217,-5.878682 -9.570241,-11.774807 -14.363458,-17.653489m-56.692745,17.53138c3.416786,7.117217 9.294954,12.298132 14.039592,18.351255c4.777024,-5.791461 9.489274,-11.635254 14.314878,-17.391826c-4.76083,-6.157788 -9.586434,-12.280688 -14.541584,-18.264034c-4.696057,5.669352 -9.942686,10.920043 -13.812885,17.304606m-21.828569,26.864005c4.90657,5.948458 9.732174,11.984137 14.525391,18.03726c4.85799,-6.035679 9.732174,-12.088802 14.71971,-18.019816c-4.80941,-6.210121 -9.586434,-12.455129 -14.654937,-18.421032c-5.117083,5.896126 -9.86172,12.141135 -14.590164,18.403588m57.081384,-18.421032c-4.696057,5.965902 -10.039846,11.373592 -14.071978,17.897707c3.611106,6.942775 9.294954,12.228355 14.088171,18.194258c4.890377,-5.861237 9.699787,-11.774807 14.541584,-17.670933c-4.777024,-6.210121 -9.489274,-12.490018 -14.557777,-18.421032m-79.719618,7.361435c-0.388639,7.291658 -0.388639,14.600761 0.04858,21.892419c3.19008,-3.820271 6.42874,-7.640542 9.796947,-11.286371c-3.3844,-3.436499 -6.62306,-7.012552 -9.845527,-10.606049m107.037716,11.059597c3.3844,3.436499 6.655446,7.029996 9.894107,10.640937c0.323866,-7.274214 0.323866,-14.565873 -0.113353,-21.822643c-3.19008,3.802827 -6.412547,7.570765 -9.780753,11.181706z" /></g></svg>
									</div>
									<h3>24</h3>
									<h4>Games</h4>
								</div> <!-- End Statistic-wrap-content -->
							</div> <!-- End col -->

							<div class="col-md-3 col-sm-6 padding-null">
								<div class="statistic-wrap-content t-center">
									<div class="icon">
										<i class="icon-signs"></i>
									</div>
									<h3>18</h3>
									<h4>Won events</h4>
								</div> <!-- End Statistic-wrap-content -->
							</div> <!-- End col -->

						</div> <!-- End Row -->
					</div> <!-- End Container -->
				</div> <!-- End Statistic Block-->

			</section> <!-- End Page-Content-->

			<!-- Start Page-Footer -->
			<?php include "includes/footer.php" ?>

		</div> <!-- End Wrapper -->

		<div class="hidden"></div>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<script>
		$(".svg-bb").mouseenter(function(){
			$(".svg-bb svg path").attr("fill","#fff");
		});
		$(".svg-bb").mouseleave(function(){
			$(".svg-bb svg path").attr("fill","#007691");
		});
		
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
