<?php ob_start(); ?>
<?php if (!isset($_SESSION)) session_start(); ?> 
<?php include_once('login/classes/translate.class.php'); ?>
<?php include_once('login/classes/check.class.php'); ?>
<?php include "../includes/connect_db.php";?>
<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href="assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/elegant-fonts.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery.scrollbar.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    <title>FHBasketBall | Recruiting</title>

</head>

<body>

<div class="page-wrapper">

    <div class="loading-overlay"></div>

    <div class="off-screen-navigation">
        <ul class="nav">
            <li>
                <a href="#about-me">
                    <i class="fa fa-user"></i>
                    <span>About Us</span>
                </a>
            </li>
            <li>
                <a href="#services">
                    <i class="fa fa-briefcase"></i>
                    <span>Player's List</span>
                </a>
            </li>
             <!-- <li>
                <a href="#" class="new-window" data-toggle="modal" data-target="#modal-blog">
                    <i class="fa fa-pencil"></i>
                    <span>Login</span>
                </a>
            </li> -->
            <!-- <li>
                <a href="#contact">
                    <i class="fa fa-envelope"></i>
                    <span>Contact</span>
                </a>
            </li> -->
        </ul>
    </div>
    <!--end off-screen-navigation-->

    <nav class="navigation">
        <a href="#" class="nav-btn">
            <i></i>
            <i></i>
            <i></i>
        </a>
        <!--end nav-btn-->
        <div class="brand">
            <a href="../index.html">
                <h2 style="display:inline;" class="lead">FHBasketball</h2>
            </a>
            <h2 style="display:inline;" class="lead"> | </h2>
            <a href="index.html">
                <h2 style="display:inline;" class="lead">Recruiting</h2>
            </a>
        </div>
        <?php if(isset($_SESSION['jigowatt']['username'])) { ?>
		<ul style="padding-left:5px; padding-right:5px;margin-right:5px;margin-left:5px;" class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<p class="navbar-text dropdown-toggle" data-toggle="dropdown" id="userDrop">
					<a href="#"><?php echo $_SESSION['jigowatt']['username']; ?></a>
					<b class="caret"></b>
				</p>
				<ul class="dropdown-menu">
		<?php if(in_array(1, $_SESSION['jigowatt']['user_level'])) { ?>
					<li><a href="login/admin/index.php"><i class="glyphicon glyphicon-home"></i> <?php _e('Control Panel'); ?></a></li>
					<li><a href="login/admin/settings.php"><i class="glyphicon glyphicon-cog"></i> <?php _e('Settings'); ?></a></li> <?php } ?>
					<li><a href="login/profile.php"><i class="glyphicon glyphicon-user"></i> <?php _e('My Account'); ?></a></li>
					<li class="divider"></li>
					<li><a href="login/logout.php"><?php _e('Sign out'); ?></a></li>
				</ul>
			</li>
		</ul>
		<?php } else { ?>
		<ul class="nav navbar-nav navbar-right">
			<li style="padding-left:5px; padding-right:5px;margin-right:5px;margin-left:5px;"><a href="login/login.php" class="signup-link"><em></em> <strong><?php _e('Sign In | Sign Up'); ?></strong></a></li>
		</ul>
		<?php } ?>
        <!-- <button style="float:right;" class="btn btn-outline-warning ml-2 clearfix">Signin</button>
        <button style="float:right;" class="btn btn-outline-warning">SignUp</button> -->
        <!--end brand-->
    </nav>
    <!--end navigation-->

    <div class="slider-navigation">
        <div class="slider-pager owl-carousel"></div>
        <div class="slider-controls">
            <a href="#" class="prev">
                <i class="fa fa-chevron-left"></i>
            </a>
            <a href="#" class="next">
                <i class="fa fa-chevron-right"></i>
            </a>
            <a href="#" class="zoom-out">
                <i class="fa fa-search-minus"></i>
            </a>
        </div>
    </div>
    <!--end slider-navigation-->

    <div class="outer-wrapper">
        <div class="inner-wrapper">
            <div class="slide first" id="0" data-position-x="0" data-position-y="0" data-position-z="1" data-rotation="0">
                <div class="main-title">
                    <div class="main-title-wrapper">
                        <h1>Florida Hornets Basketball</h1>
                        <h2>Are you ready to become a member of Florida Hornets?</h2>
                        <a href="#" class="btn btn-default next">Show Team Players</a>
                    </div>
                </div>
                <div class="image" data-background="assets/img/0.jpg"></div>
                <!--end image-->
            </div>
            <!--end slide-->

            <?php 
                $sql = "SELECT * from team_players order by player_id__blazeweb";
                $result = $con->query($sql);
                if($result->num_rows>0){
                    $count = 1;
                    while($row = $result->fetch_assoc()){

            ?>

            <div class="slide" id="<?php echo $count ?>">
                <div class="description" style="text-shadow: 1px 1px 2px black;">
                    <h2 class="animate"><?php echo $row["player_firstname__blazeweb"]." ".$row["player_lastname__blazeweb"] ?></h2>
                    <dl class="animate">
                    <?php if( protectThis("*") ) : ?>
                        <dt>Name:</dt>
                        <dd>
                            
                            <?php echo $row["player_firstname__blazeweb"]." ".$row["player_lastname__blazeweb"] ?>
                            <?php else : ?>
                                You need to login to view this.
                            <?php endif; ?>
                        </dd>
                        <dt>Height:</dt>
                        <dd><?php echo $row["player_height__blazeweb"]?> m</dd>
                        <dt>Weight:</dt>
                        <dd><?php echo $row["player_weight__blazeweb"]?> Lbs</dd>
                        <!-- <dt>Website:</dt>
                        <dd><a href="http://www.johndoe.com">www.johndoe.com</a>
                        </dd> -->
                    </dl>
                    <div class="additional-info animate">
                        <dl>
                            <dt>Jersey Number:</dt>
                            <dd><?php echo $row["player_jerseynumber__blazeweb"]?></dd>
                            <dt>Position:</dt>
                            <dd><?php echo $row["player_positions__blazeweb"]?></dd>
                            <dt>Sypnosis:</dt>
                            <dd style="max-width:30%;"><?php echo $row["player_sypnosis__blazeweb"]?></dd>
                        </dl>
                    </div>
                </div>
                <!--end description-->
                <div class="image" data-position="<?php echo $row["player_background_position__blazeweb"] ?>" data-background="../img/players/<?php echo $row["player_image__blazeweb"]?>"></div>
                <!--end image-->
            </div>
            <!--end slide-->
            <?php $count++; }}?>
        </div>
        <!--end page-wrapper-->
    </div>
    <!--end outer-wrapper-->

    <div class="off-screen-content">
        <div class="scrollbar-inner">
            <section id="about-me">
                <div class="image-header">
                    <div class="bg-transfer"><img src="assets/img/image-header.jpg" alt=""></div>
                </div>
                <div class="section-wrapper">
                    <h2>About Us</h2>

                    <h3>Recruiting Services</h3>

                    <p>
                        We seek to assist in the efforts of young basketball players in Palm Beach County. We provide free evaluations for players that feel they can play basketball at the next level. After evaluation, each player is interviewed before being shared to our listings. 
                    
                    </p>

                    <p>
                        We adhere to a strict standard, our student athletes are great students first, great athletes second.
                    </p>
                    
                </div>
                <!--end section-wrapper-->
            </section>
            <!--end #about-me-->

            <section id="services">
                <div class="section-wrapper">
                    <h2>Player's list</h2>
                    <div class="holder">
                    <?php 
                        $sql = "SELECT * from team_players order by player_id__blazeweb";
                        $result = $con->query($sql);
                        if($result->num_rows>0){
                            $count = 1;
                            while($row = $result->fetch_assoc()){

                    ?>
                        <img style="width:30%" src="../img/players/<?php echo $row["player_image__blazeweb"]; ?>" alt="">
                            <?php }}?>
                    </div>
                    
                    
                </div>
                <!--end section-wrapper-->
            </section>
            <!--end #contact-->
        </div>
    </div>
    <!--end off-screen-content-->
</div>
<!--end page-wrapper-->

<!-- Modal -->
<div class="modal fade" id="modal-blog" tabindex="-1" role="dialog" aria-labelledby="modal-blog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <iframe data-src="login/login.php"></iframe>
        </div>
    </div>
</div>
<!--end modal-->

<script type="text/javascript" src="assets/js/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/pace.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>

<script type="text/javascript">

    $(document).ready(function ($) {
        "use strict";



    });

    var latitude = 34.038405;
    var longitude = -117.946944;
    var markerImage = "assets/img/map-marker.png";
    var mapTheme = "light";
    var mapElement = "map";
    google.maps.event.addDomListener(window, "load", simpleMap(latitude, longitude, markerImage, mapTheme, mapElement));

</script>

</body>