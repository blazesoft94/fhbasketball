
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="../index.php"><?php _e('FHBasketball | Recruiting'); ?></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
				<!-- <li><a href="home.php"><?php _e('Home'); ?></a></li>
				<li><a href="protected.php"><?php _e('Secure page'); ?></a></li>
				<li><a href="admin/"><?php _e('Admin panel'); ?></a></li> -->
			</ul>
		<?php if(isset($_SESSION['jigowatt']['username'])) { ?>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<p class="navbar-text dropdown-toggle" data-toggle="dropdown" id="userDrop">
					<?php //echo $_SESSION['jigowatt']['gravatar']; ?>
					<a href="#"><?php echo $_SESSION['jigowatt']['username']; ?></a>
					<b class="caret"></b>
				</p>
				<ul class="dropdown-menu">
		<?php if(in_array(1, $_SESSION['jigowatt']['user_level'])) { ?>
					<li><a href="admin/index.php"><i class="glyphicon glyphicon-home"></i> <?php _e('Control Panel'); ?></a></li>
					<li><a href="admin/settings.php"><i class="glyphicon glyphicon-cog"></i> <?php _e('Settings'); ?></a></li> <?php } ?>
					<li><a href="profile.php"><i class="glyphicon glyphicon-user"></i> <?php _e('My Account'); ?></a></li>
					<!-- <li><a href="http://phplogin.jigowatt.co.uk/install.php"><i class="glyphicon glyphicon-info-sign"></i> <?php _e('Help'); ?></a></li> -->
					<li class="divider"></li>
					<li><a href="logout.php"><?php _e('Sign out'); ?></a></li>
				</ul>
			</li>
		</ul>
		<?php } else { ?>
			<ul class="nav navbar-nav navbar-right">
			<li style="padding-left:5px; padding-right:5px;margin-right:5px;margin-left:5px;"><a href="login.php" class="signup-link"><em></em> <strong><?php _e('Sign In | Sign Up'); ?></strong></a></li>
		</ul>
		<?php } ?>
   </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
