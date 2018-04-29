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

// if(isset($_GET["success"])){
//     $success = $_GET["success"];
// }
if(isset($_GET["delete"])){
    $s_id = $_GET["sponsor_id"];
    //Delete previous image
    $sql = "select sponsor_image__blazeweb from sponsors where sponsor_id__blazeweb = '$s_id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if(!(empty($row["sponsor_image__blazeweb"]))){
        $prev_image_name = "../img/partners/".$row["sponsor_image__blazeweb"];            
        unlink($prev_image_name);        
    }

    $sql = "DELETE from sponsors where sponsor_id__blazeweb = '$s_id'";
    $con->query($sql);
    header("Location: sponsors.php");
}

if(isset($_POST["edit_sponsor"])){
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
        if(!(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/partners/'.$file_name))){
            $success = false;
            $error = 2;
        }
        $file_temp_name = compress_and_resize_image('../img/partners/'.$file_name, '../img/partners/'.$file_name, 85, 315,168);     
        //deleting previous file
        if($success){
            $sponsor_id = $_POST["sponsor_id"];
            $sql = "select sponsor_image__blazeweb from sponsors where sponsor_id__blazeweb = '$sponsor_id'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            if(!(empty($row["sponsor_image__blazeweb"]))){
                $prev_image_name = "../img/partners/".$row["sponsor_image__blazeweb"];            
                unlink($prev_image_name);        
            }
            $sql = "UPDATE `sponsors` SET `sponsor_image__blazeweb` = '$file_name' where `sponsor_id__blazeweb` = '$sponsor_id'";
            if(!($con->query($sql)==TRUE)){
                $success = false;
            }
        }
    }
    if($success){
        $sponsor_id = $_POST["sponsor_id"];
        $name = $_POST["sponsor_name"];
        $level = $_POST["sponsor_level"];
        $text = $_POST["sponsor_text"];
        $url = $_POST["sponsor_url"];
       $sql = "UPDATE `sponsors` SET `sponsor_name__blazeweb` = '$name', `sponsor_url__blazeweb` = '$url', `sponsor_text__blazeweb` = '$text', `sponsor_level__blazeweb` = '$level' WHERE `sponsors`.`sponsor_id__blazeweb` = $sponsor_id;"; 
       if($con->query($sql)==TRUE){
           $success = true;
            header("Location: sponsors.php");
       }
       else{
        header("Location: sponsors.php?success=false");
        
       }
    }
}

if(isset($_POST["add_sponsor"])){
    $file_name = "";
    if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 ){
        $allowed = array('png', 'jpg', 'gif','jpeg');
        $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($extension), $allowed)){
            $success = false;
            $error = 1;
        }
        $file_name = generateRandomString()."-" . $_FILES['upl']['name'];
        if(!(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/partners/'.$file_name))){
            $success = false;
            $error = 2;
        }
        $file_temp_name = compress_and_resize_image('../img/partners/'.$file_name, '../img/partners/'.$file_name, 85, 315,168);     
        
    }
    if($success){
        $name = $_POST["sponsor_name"];
        $level = $_POST["sponsor_level"];
        $text = $_POST["sponsor_text"];
        $url = $_POST["sponsor_url"];
        $sql = "INSERT INTO `sponsors` (`sponsor_id__blazeweb`, `sponsor_image__blazeweb`, `sponsor_name__blazeweb`, `sponsor_url__blazeweb`, `sponsor_text__blazeweb`, `sponsor_level__blazeweb`) VALUES (NULL, '$file_name', '$name', '$url', '$text', '$level');"; 
       if($con->query($sql)==TRUE){
           $success = true;
            header("Location: sponsors.php");
       }
       else{
        header("Location: sponsors.php?success=false");
        
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
                        <div class="row" id="container">
                            <div class="col-md-12">
                                <button class="btn btn-primary" data-toggle='modal' data-target='#sponsor_add_modal'>Add Sponsor</button><br/><br/>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Sponsor Name</th>
                                            <th>Image</th>                                            
                                            <th>Url</th>
                                            <th>Details</th>
                                            <th>Level</th>
                                            <th>View/Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //Display Players
                                        $sql = "SELECT * from sponsors ORDER BY sponsor_id__blazeweb desc";
                                        $result = $con->query($sql);
                                        if($result->num_rows>0){
                                            $count=0;
                                            while($row = $result->fetch_assoc()){
                                                $count++;
                                                // echo(strip_tags($your_string));
                                                $s_id = $row["sponsor_id__blazeweb"];
                                                $s_name = $row['sponsor_name__blazeweb'];
                                                $s_text = $row['sponsor_text__blazeweb'];
                                                $s_image = $row['sponsor_image__blazeweb'];
                                                $s_url = $row['sponsor_url__blazeweb'];
                                                $s_level = $row['sponsor_level__blazeweb'];
                                                echo "<tr>";
                                                echo "<th scope='row'>{$count}</th>";
                                                echo "<td>{$s_name}</td>";
                                                echo "<td><img width='165' src='../img/partners/{$s_image}'></img></td>";                                                
                                                echo "<td>{$s_url}</td>";
                                                echo "<td>{$s_text}</td>";
                                                echo "<td>{$s_level}</td>";
                                                echo "<td><a href='#' type='button' class='show-sponsor-edit-modal'  data-id='$s_id'  data-name='$s_name'  data-image='$s_image' data-url='$s_url' data-level='$s_level' data-text='$s_text' >View</a></td>";
                                                echo "<td><a href='sponsors.php?delete=true&sponsor_id={$s_id}'>Delete</a></td>";
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
    <!-- Edit Modal -->

    <div class="modal fade" id="sponsor_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">View/Edit Sponsor</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="sponsor-name" name="sponsor_name">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Url:</label>
                        <input type="text" class="form-control" id="sponsor-url" name="sponsor_url">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Level:</label>
                        <select name="sponsor_level" id="sponsor-level">
                            <option class="level-1" value="1">1 - Gold</option>
                            <option class="level-2" value="2">2 - Normal</option>
                        </select>
                    </div>
                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Image:</label>
                                            <img src="" width="250" id="sponsor-image" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="upload">
                                            <label for="title" class="col-form-label">Upload different image (315 x 168):</label>
                                                <input type="file" accept="image/*" name="upl" />
                                    </div></div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Details:</label>
                        <textarea type="text" rows="8" class="form-control" id="sponsor-text" name="sponsor_text"></textarea>
                    </div>
                    
                    
                    <input style="display:none;" type="text" class="d-none" name="sponsor_id" id="sponsor-id">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_sponsor" class="btn btn-primary">Save</button>
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
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Add Sponsor</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="sponsor-name-2" name="sponsor_name">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Url:</label>
                        <input type="text" class="form-control" id="sponsor-url-2" name="sponsor_url">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Level:</label>
                        <select name="sponsor_level" id="sponsor-level-2">
                            <option class="level-1" value="1">1 - Gold</option>
                            <option class="level-2" value="2">2 - Normal</option>
                        </select>
                    </div>
                    <div class="form-group" id="upload">
                        <label for="title" class="col-form-label">Upload image  (315 x 168):</label>
                        <input type="file" accept="image/*" name="upl" />
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Details:</label>
                        <textarea type="text" rows="8" class="form-control" id="sponsor-text-2" name="sponsor_text"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_sponsor" class="btn btn-primary">Save</button>
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
<script src="js/sponsors.js"></script>


<?php
    include "includes/footer.php";
?>
<?php }
else{
    header("Location: login.php");
}
?>