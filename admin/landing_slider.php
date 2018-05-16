<?php
session_start();
include "includes/header.php";
?>
<?php if(isset($_SESSION["admin_login"]) && $_SESSION["role"]=="admin"){?>
<?php 
//delete post
// deletePost();
$success = true;
$error = 0;

// if(isset($_GET["success"])){
//     $success = $_GET["success"];
// }
if(isset($_GET["delete"])){
    $s_id = $_GET["lp_id"];
    //Delete previous image
    $sql = "select lp_image__blazeweb from landing_page_slider where lp_id__blazeweb = '$s_id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if(!(empty($row["lp_image__blazeweb"]))){
        $prev_image_name = "../img/carousel/".$row["lp_image__blazeweb"];            
        unlink($prev_image_name);        
    }

    $sql = "DELETE from landing_page_slider where lp_id__blazeweb = '$s_id'";
    $con->query($sql);
    header("Location: landing_slider.php");
}

if(isset($_POST["edit_lp"])){
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
        if(!(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/carousel/'.$file_name))){
            $success = false;
            $error = 2;
        }
        $file_temp_name = compress_and_resize_image('../img/carousel/'.$file_name, '../img/carousel/'.$file_name, 85, 1920,865);     
        //deleting previous file
        if($success){
            $lp_id = $_POST["lp_id"];
            $sql = "select lp_image__blazeweb from landing_page_slider where lp_id__blazeweb = '$lp_id'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            if(!(empty($row["lp_image__blazeweb"]))){
                $prev_image_name = "../img/carousel/".$row["lp_image__blazeweb"];            
                unlink($prev_image_name);        
            }
            $sql = "UPDATE `landing_page_slider` SET `lp_image__blazeweb` = '$file_name' where `lp_id__blazeweb` = '$lp_id'";
            if(!($con->query($sql)==TRUE)){
                $success = false;
            }
        }
    }
    if($success){
        $lp_id = $_POST["lp_id"];
        $heading= $_POST["lp_heading"];
        $subtext = $_POST["lp_subtext"];
       $sql = "UPDATE `landing_page_slider` SET `lp_heading__blazeweb` = '$heading', `lp_subtext__blazeweb` = '$subtext' WHERE `landing_page_slider`.`lp_id__blazeweb` = $lp_id;"; 
       if($con->query($sql)==TRUE){
           $success = true;
            header("Location: landing_slider.php");
       }
       else{
        header("Location: landing_slider.php?success=false");
        
       }
    }
}

if(isset($_POST["add_lp"])){
    $file_name = "";
    if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 ){
        $allowed = array('png', 'jpg', 'gif','jpeg');
        $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($extension), $allowed)){
            $success = false;
            $error = 1;
        }
        $file_name = generateRandomString()."-" . $_FILES['upl']['name'];
        if(!(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/carousel/'.$file_name))){
            $success = false;
            $error = 2;
        }
        $file_temp_name = compress_and_resize_image('../img/carousel/'.$file_name, '../img/carousel/'.$file_name, 85,1980,865);     
        
    }
    if($success){
        $heading = $_POST["lp_heading"];
        $subtext = $_POST["lp_subtext"];
        $sql = "INSERT INTO `landing_page_slider` (`lp_id__blazeweb`, `lp_image__blazeweb`, `lp_heading__blazeweb`, `lp_subtext__blazeweb`) VALUES (NULL, '$file_name', '$heading', '$subtext');"; 
       if($con->query($sql)==TRUE){
           $success = true;
            header("Location: landing_slider.php");
       }
       else{
        header("Location: landing_slider.php?success=false");
        
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
                            <small class="muted">Landing Page Slider</small>
                        </h1>
                        <div class="row" id="container">
                            <div class="col-md-12">
                                <button class="btn btn-primary" data-toggle='modal' data-target='#sponsor_add_modal'>Add Slider Photo</button><br/><br/>
                                <div class="table-responsive">
                                <table 
                                    class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                                    data-provide="datatable" 
                                    data-display-rows="10"
                                    data-info="true"
                                    data-search="true"
                                    data-length-change="true"
                                    data-paginate="true"
                                >
                                    <thead class="thead-dark">
                                        <tr>
                                            <th data-filterable="true" data-sortable="true">#</th>
                                            <th data-filterable="true" data-sortable="true">Image Heading</th>
                                            <th>Image</th>                                            
                                            <th data-filterable="true" data-sortable="true">Image Sub-Text</th>
                                            <th>View/Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //Display Players
                                        $sql = "SELECT * from landing_page_slider  ORDER BY lp_id__blazeweb desc";
                                        $result = $con->query($sql);
                                        if($result->num_rows>0){
                                            $count=0;
                                            while($row = $result->fetch_assoc()){
                                                $count++;
                                                // echo(strip_tags($your_string));
                                                $s_id = $row["lp_id__blazeweb"];
                                                $s_heading = $row['lp_heading__blazeweb'];
                                                $s_text = $row['lp_subtext__blazeweb'];
                                                $s_image = $row['lp_image__blazeweb'];
                                                echo "<tr>";
                                                echo "<th scope='row'>{$count}</th>";
                                                echo "<td>{$s_heading}</td>";
                                                echo "<td><img width='165' src='../img/carousel/{$s_image}'></img></td>";                                                
                                                echo "<td>{$s_text}</td>";
                                                echo "<td><a href='#' type='button' class='show-sponsor-edit-modal'  data-id='$s_id'  data-heading='$s_heading' data-image='$s_image' data-subtext='$s_text' >View</a></td>";
                                                echo "<td><a href='landing_slider.php?delete=true&lp_id={$s_id}'>Delete</a></td>";
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
                </div>
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- Edit Modal -->

    <div class="modal fade" id="sponsor_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">View/Edit Carousel Image</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Image Heading:</label>
                        <input type="text" class="form-control" id="lp-heading" name="lp_heading">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Image Sub-Text:</label>
                        <input type="text" class="form-control" id="lp-subtext" name="lp_subtext">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Image Preview:</label>
                                <img src="" width="250" class="focus-image" id="lp-image" alt="">
                                <!-- <input type="text" class="form-control" id="player-image" name="player_image"> -->
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group" id="upload">
                                    <label for="title" class="col-form-label">Upload image (1920x865):</label>
                                        <input class="focus-image-upload" type="file" accept="image/*" name="upl" />
                                </div>
                            </div>
                    </div>
                    
                    
                    <input style="display:none;" type="text" class="d-none" name="lp_id" id="lp-id">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_lp" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add modal -->


<div class="modal fade" id="sponsor_add_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Add Slider Photo</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Image Heading:</label>
                        <input type="text" class="form-control" id="lp-heading2" name="lp_heading">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Image Sub-Text:</label>
                        <input type="text" class="form-control" id="lp-subtext2" name="lp_subtext">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Image Preview:</label>
                                <img src="" width="250" class="focus-image" id="lp-image2" alt="">
                                <!-- <input type="text" class="form-control" id="player-image" name="player_image"> -->
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group" id="upload">
                                    <label for="title" class="col-form-label">Upload image (1920x865):</label>
                                        <input class="focus-image-upload" type="file" accept="image/*" name="upl" />
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_lp" class="btn btn-primary">Save</button>
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

</script>
<script src="js/waitMe.min.js"></script>
<script src="js/landingslider.js"></script>
<script src="js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="js/plugins/datatables/DT_bootstrap.js"></script>

  <script src="js/target-admin.js"></script>


<?php
    include "includes/footer.php";
?>
<?php }
else{
    header("Location: login.php");
}
?>