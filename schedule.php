<?php $current_page = "Schedule" ?>
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
					<li class="active">schedule</li>
				</ul>
			</div> <!-- End Breadcrumbs -->

			<!-- Start  Schedule Block -->
			<div class="schedule-block">
				<div class="container">
					<div class="row">

						<div class="text-wrap t-center">
							<h2><span class="orange-text">Schedule</span></h2>
							<h4>We are pleased to announce our 2017 schedule</h4>
						</div>

						<div class="links-wrap">
							<ul>
								<li><a href="#" class="btn btn-link-g one-l on"><span>Upcoming</span></a></li>
								<li><a href="#" class="btn btn-link-g two-l"><span>Played</span></a></li>
							</ul>
						</div>

						<div class="table-wrap">
								<div class="wrap-inner-s-1">
								<table >
									<tr class="orange-text">
										<th>Date</th>
										<th>Venue</th>
										<th>Opponent</th>
										<th>Result</th>
										<th class="hidden-xs">Competition</th>
									</tr>
									<?php 
										$sql = "SELECT *
										from schedules
										where schedule_played__blazeweb = 'No'
										ORDER BY schedule_date__blazeweb desc
										LIMIT 15";
										$result = $con->query($sql);
										if($result->num_rows>0){
											$c = 0;
											while($row = $result->fetch_assoc()){
												$dt = DateTime::createFromFormat('!Y-m-d', $row["schedule_date__blazeweb"]);
												$dt = strtoupper($dt->format('d M'));
												$year = date("Y", strtotime($row["schedule_date__blazeweb"]));  //"2018";//strtoupper($dt->format('y'));
												$time = DateTime::createFromFormat('!H:i:s', $row["schedule_time__blazeweb"]);
												$time = strtoupper($time->format('H:i'));
									?>
									
										<tr <?php echo ($c%2==0) ? 'class="p-gray"' : '' ?>>
											<th><?php echo "$dt, $time";?></th>
											<th><?php echo $row["schedule_venue__blazeweb"] ?></th>
											<th><?php echo $row["schedule_opponent__blazeweb"] ?></th>
											<th><?php echo $row["schedule_result__blazeweb"] ?></th>
											<th class="hidden-xs"><?php echo $year?></th>
										</tr>
									<?php $c++; }}?>
									
								</table>
							</div>
							<div class="wrap-inner-s-2">
								<table>
									<tr class="orange-text">
										<th>Date</th>
										<th>Venue</th>
										<th>Opponent</th>
										<th>Result</th>
										<th class="hidden-xs">Competition</th>
									</tr>
									<?php 
										$sql = "SELECT *
										from schedules
										where schedule_played__blazeweb = 'Yes'
										ORDER BY schedule_date__blazeweb desc
										LIMIT 15";
										$result = $con->query($sql);
										if($result->num_rows>0){
											$c = 0;
											while($row = $result->fetch_assoc()){
												$dt = DateTime::createFromFormat('!Y-m-d', $row["schedule_date__blazeweb"]);
												$dt = strtoupper($dt->format('d M'));
												$year = date("Y", strtotime($row["schedule_date__blazeweb"]));  //"2018";//strtoupper($dt->format('y'));
												$time = DateTime::createFromFormat('!H:i:s', $row["schedule_time__blazeweb"]);
												$time = strtoupper($time->format('H:i'));
									?>
									
										<tr <?php echo ($c%2==0) ? 'class="p-gray"' : '' ?>>
											<th><?php echo "$dt, $time";?></th>
											<th><?php echo $row["schedule_venue__blazeweb"] ?></th>
											<th><?php echo $row["schedule_opponent__blazeweb"] ?></th>
											<th><?php echo $row["schedule_result__blazeweb"] ?></th>
											<th class="hidden-xs"><?php echo $year?></th>
										</tr>
									<?php $c++; }}?>
									
								</table>
						</div>
						</div>	

						<a href="#" class="btn-view btn btn-link-g"><span>view all events</span></a>

					</div> <!-- End row -->
				</div> <!-- End comtainer -->
			</div> <!-- End Schedule -->


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
