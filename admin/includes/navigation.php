
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin CMS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i> <?php echo $_SESSION["role"] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="#" id="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                    <form style="display:none;" action="signout.php" method="POST">
                        <button type="submit" name="logoutButton" id="logoutButton">
                    </form>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="view_players.php" ><i class="fa fa-fw fa-users"></i> Players </a>
                    </li>
                    <li>
                        <a href="sponsors.php"><i class="fa fa-fw fa-paw"></i> Sponsors</a>
                    </li>
                    
                    <li>
                        <a href="gallery.php"><i class="fa fa-photo "></i> Gallery</a>
                    </li>
                    <li class="">
                        <a href="schedule.php"><i class="fa fa-fw fa-calendar"></i> Schedule</a>
                    </li>
                    <li>
                        <a href="landing_slider.php"><i class="fa fa-fw fa-arrows-h"></i> Landing Slider Photos</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
</nav>