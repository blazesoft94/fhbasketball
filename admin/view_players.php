<?php
session_start();
include "includes/header.php";
?>
<?php if(isset($_SESSION["login"]) && $_SESSION["role"]=="admin"){?>
<?php 
//delete post
// deletePost();
$success = true;
$error = 0;

if(isset($_GET["success"])){
    $success = $_GET["success"];
}
if(isset($_GET["delete"])){
    $p_id = $_GET["delete"];
    $sql = "select player_image__blazeweb from team_players where player_id__blazeweb = '$p_id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if(!(empty($row["player_image__blazeweb"]))){
        $prev_image_name = "../img/players/".$row["player_image__blazeweb"];            
        unlink($prev_image_name);        
    }

    $sql = "DELETE from team_players where player_id__blazeweb = '$p_id'";
    $con->query($sql);
    header("Location: view_players.php");
}

if(isset($_POST["edit_player"])){
    $file_name = "";
    if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 ){
        $allowed = array('png', 'jpg', 'gif','jpeg');
        $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($extension), $allowed)){
            $success = false;
            $error = 1;
        }
        $file_name = generateRandomString()."-" . $_FILES['upl']['name'];
//        exit;
        if(!(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/players/'.$file_name))){
            $success = false;
            $error = 2;
        }
        $file_temp_name = compress_and_resize_image('../img/players/'.$file_name, '../img/players/'.$file_name, 85, 1000,1000);     
        //deleting previous file
        if($success){
            $player_id = $_POST["player_id"];
            $sql = "select player_image__blazeweb from team_players where player_id__blazeweb = '$player_id'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            if(!(empty($row["player_image__blazeweb"]))){
                $prev_image_name = "../img/players/".$row["player_image__blazeweb"];            
                unlink($prev_image_name);        
            }
            $sql = "UPDATE `team_players` SET `player_image__blazeweb` = '$file_name' where `player_id__blazeweb` = '$player_id'";
            if(!($con->query($sql)==TRUE)){
                $success = false;
            }
        }
    }
    if($success){
        $player_id = $_POST["player_id"];
        $fname = $_POST["player_fname"];
        $jersey = $_POST["player_jersey"];
        $lname = $_POST["player_lname"];
        $position = $_POST["player_position"];
        $height = $_POST["player_height"];
        $weight = $_POST["player_weight"];
        $sypnosis = $_POST["player_sypnosis"];
        $focus_x = $_POST["player_focus_x"];
        $focus_y = $_POST["player_focus_y"];
        $background = $_POST["player_background"];        
        $sql = "UPDATE `team_players` SET `player_firstname__blazeweb` = '$fname',`player_focus_x__blazeweb` = '$focus_x',`player_focus_y__blazeweb` = '$focus_y',`player_background_position__blazeweb` = '$background', `player_lastname__blazeweb` = '$lname', `player_positions__blazeweb` = '$position', `player_jerseynumber__blazeweb` = '$jersey', `player_height__blazeweb` = '$height', `player_weight__blazeweb` = '$weight', `player_sypnosis__blazeweb` = '$sypnosis' WHERE `team_players`.`player_id__blazeweb` = '$player_id';"; 
       if($con->query($sql)==TRUE){
           $success = true;
            header("Location: view_players.php");
       }
       else{
        header("Location: view_players.php?success=false");
        
       }
    }
}

if(isset($_POST["add_player"])){
    $file_name = "";
    if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 ){
        $allowed = array('png', 'jpg', 'gif','jpeg');
        $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($extension), $allowed)){
            $success = false;
            $error = 1;
        }
        $file_name = generateRandomString()."-" . $_FILES['upl']['name'];
        if(!(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/players/'.$file_name))){
            $success = false;
            $error = 2;
        }
        $file_temp_name = compress_and_resize_image('../img/players/'.$file_name, '../img/players/'.$file_name, 85, 1000,1000);        
    }
    if($success){
        $fname = $_POST["player_fname"];
        $jersey = $_POST["player_jersey"];
        $lname = $_POST["player_lname"];
        $position = $_POST["player_position"];
        $height = $_POST["player_height"];
        $weight = $_POST["player_weight"];
        $sypnosis = $_POST["player_sypnosis"];
        $focus_x = $_POST["player_focus_x"];
        $focus_y = $_POST["player_focus_y"];
        $background = $_POST["player_background"];
        //player_background_position__blazeweb
       $sql = "INSERT INTO `team_players` (`player_id__blazeweb`, `player_firstname__blazeweb`, `player_lastname__blazeweb`, `player_positions__blazeweb`, `player_jerseynumber__blazeweb`, `player_height__blazeweb`, `player_weight__blazeweb`, `player_image__blazeweb`,`player_focus_x__blazeweb`,`player_focus_y__blazeweb`,`player_background_position__blazeweb`, `player_sypnosis__blazeweb`) VALUES (NULL, '$fname', '$lname', '$position', '$jersey', '$height', '$weight', '$file_name','$focus_x','$focus_y', '$background','$sypnosis');"; 
       if($con->query($sql)==TRUE){
           $success = true;
            header("Location: view_players.php");
       }
       else{
        header("Location: view_players.php?success=false");
        
       }
    }
}
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include "includes/navigation.php";
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Panel
                            <small class="muted">Players</small>
                        </h1>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" data-toggle='modal' data-target='#player_add_modal'>Add Player</button><br/><br/>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Jersey</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Position</th>
                                            <th>Image</th>
                                            <th>Height (m)</th>
                                            <th>Weight (lbs)</th>
                                            <th>View/Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //Display Players
                                        $sql = "SELECT * from team_players ORDER BY player_id__blazeweb desc";
                                        $result = $con->query($sql);
                                        if($result->num_rows>0){
                                            $count=0;
                                            while($row = $result->fetch_assoc()){
                                                $count++;
                                                $p_id = $row["player_id__blazeweb"];
                                                $p_jersey = $row['player_jerseynumber__blazeweb'];
                                                $p_fname = $row['player_firstname__blazeweb'];
                                                $p_lname = $row['player_lastname__blazeweb'];
                                                $p_position = $row['player_positions__blazeweb'];
                                                $p_image = $row['player_image__blazeweb'];
                                                $p_height = $row['player_height__blazeweb'];
                                                $p_weight = $row['player_weight__blazeweb'];
                                                echo "<tr>";
                                                echo "<th scope='row'>{$p_jersey}</th>";
                                                echo "<td>{$p_fname}</td>";
                                                echo "<td>{$p_lname}</td>";
                                                echo "<td>{$p_position}</td>";
                                                echo "<td><img width='100' src='../img/players/{$p_image}'></img></td>";
                                                echo "<td>{$p_height}</td>";
                                                echo "<td>{$p_weight}</td>";
                                                echo "<td><a href='#' type='button' class='' data-toggle='modal' data-id='$p_id' data-target='#player_edit_modal' data-jersey='$p_jersey'  data-fname='$p_fname' data-lname='$p_lname' data-position='$p_position' data-height='$p_height' data-weight='$p_weight' >View</a></td>";
                                                echo "<td><a href='view_players.php?delete={$p_id}'>Delete</a></td>";
                                                echo "</tr>";
                                            }
                                        }
                                    ?>  
                                        <!-- <tr>
                                            <th scope="row">1</th>
                                            <td>John</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <div class="modal fade" id="player_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">View/Edit Player</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Jersey Number:</label>
                        <input type="text" class="form-control" id="player-jersey" name="player_jersey">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control" id="player-fname" name="player_fname">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control" id="player-lname" name="player_lname">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Position:</label>
                        <input type="text" class="form-control" id="player-position" name="player_position">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Image (Click on the player's forehead to  the focus points):</label>
                                <img src="" width="250" class="focus-image" id="player-image" alt="">
                                <!-- <input type="text" class="form-control" id="player-image" name="player_image"> -->
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group" id="upload">
                                    <label for="title" class="col-form-label">Upload different image:</label>
                                        <input class="focus-image-upload" type="file" accept="image/*" name="upl" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Focus points (x,y):</label>
                                <input type="text" class="form-control focus-x" id="focus-x" name="player_focus_x">
                                <input type="text" class="form-control focus-y" id="focus-y" name="player_focus_y">
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <input type="text" style="display:block" name="player_background" id="player-background" >
                    <div class="form-group">
                        <label for="title" class="col-form-label">Height in metres:</label>
                        <input type="text" class="form-control" id="player-height" name="player_height">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Weight in lbs:</label>
                        <input type="text" class="form-control" id="player-weight" name="player_weight">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Player Sypnosis:</label>
                        <textarea type="text" rows="8" class="form-control" id="player-sypnosis" name="player_sypnosis"></textarea>
                    </div>
                    
                    <input style="display:none;" type="text" class="d-none" name="player_id" id="player-id">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_player" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="player_add_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Add Player</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Jersey Number:</label>
                        <input type="text" class="form-control" id="player-jersey2" name="player_jersey">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control" id="player-fname2" name="player_fname">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control" id="player-lname2" name="player_lname">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Position:</label>
                        <input type="text" class="form-control" id="player-position2" name="player_position">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Image (Click on player's forehead to get the focus points):</label>
                                <img src="" width="250" class="focus-image" id="player-image2" alt="">
                                <!-- <input type="text" class="form-control" id="player-image" name="player_image"> -->
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group" id="upload">
                                    <label for="title" class="col-form-label">Upload different image:</label>
                                        <input class="focus-image-upload" type="file" accept="image/*" name="upl" />
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Focus points (x,y):</label>
                                <input type="text" class="form-control focus-x" id="focus-x-2" name="player_focus_x">
                                <input type="text" class="form-control focus-y" id="focus-y-2" name="player_focus_y">
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <input type="text" style="display:block" name="player_background" id="player-background-2" >                    
                    
                    <div class="form-group">
                        <label for="title" class="col-form-label">Height in metres:</label>
                        <input type="text" class="form-control" id="player-height2" name="player_height">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Weight in lbs:</label>
                        <input type="text" class="form-control" id="player-weight2" name="player_weight">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Player Sypnosis:</label>
                        <textarea type="text" rows="8" class="form-control" id="player-sypnosis" name="player_sypnosis"></textarea>
                    </div>
                    
                    <!-- <input style="display:none;" type="text" class="d-none" name="player_id" id="player-id2"> -->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_player" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var linkElement = document.createElement("link");
    linkElement.rel = "stylesheet";
    linkElement.href = "image_uploader/assets/css/style.css"; //Replace here
    document.head.appendChild(linkElement);

    function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('.focus-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
    }

    $(document).ready(function(){
        

        $(".focus-image-upload").change(function() {
        readURL(this);
        });
    });
</script>
<script src="js/players.js"></script>
<script type="text/javascript" src="js/jquery.focuspoint.helper-basic.js"></script>
<!-- <script src="image_uploader/assets/js/jquery.knob.js"></script> -->

<!-- jQuery File Upload Dependencies -->
<!-- <script src="image_uploader/assets/js/jquery.min.js"></script>
<script src="image_uploader/assets/js/jquery.ui.widget.js"></script>
<script src="image_uploader/assets/js/jquery.iframe-transport.js"></script>
<script src="image_uploader/assets/js/jquery.fileupload.js"></script> -->

<!-- file upload main JS file -->
<!-- <script src="image_uploader/assets/js/script.js"></script> -->

<script>
    // $("img").click(function(){
    //     $("form").submit();
    // })
</script>
<?php
    include "includes/footer.php";
?>
<?php }
else{
    header("Location: login.php");
}
?>