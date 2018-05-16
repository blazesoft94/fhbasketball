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

if(isset($_GET["success"])){
    $success = $_GET["success"];
}
if(isset($_GET["delete"])){
    $p_id = $_GET["delete"];
    $sql = "select gallery_image__blazeweb from gallery where gallery_id__blazeweb = '$p_id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if(!(empty($row["gallery_image__blazeweb"]))){
        $prev_image_name = "../img/clubGallery/".$row["gallery_image__blazeweb"];            
        unlink($prev_image_name);        
        unlink($prev_image_name."-thumb.jpg");        
    }

    $sql = "DELETE from gallery where gallery_id__blazeweb = '$p_id'";
    $con->query($sql);
    header("Location: gallery.php");
}

if(isset($_POST["edit_gallery"])){
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
        if(!(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/clubGallery/'.$file_name))){
            $success = false;
            $error = 2;
        }
        $file_temp_name = compress_and_resize_image('../img/clubGallery/'.$file_name, '../img/clubGallery/'.$file_name, 85, 1000,1000);     
        $file_thumb = compress_and_resize_image('../img/clubGallery/'.$file_name, '../img/clubGallery/'.$file_name."-thumb.jpg", 50, 640,500);       
        
        //deleting previous file
        if($success){
            $gallery_id = $_POST["gallery_id"];
            $sql = "select gallery_image__blazeweb from gallery where gallery_id__blazeweb = '$gallery_id'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            if(!(empty($row["gallery_image__blazeweb"]))){
                $prev_image_name = "../img/clubGallery/".$row["gallery_image__blazeweb"];            
                unlink($prev_image_name);        
                unlink($prev_image_name."-thumb.jpg");        
            }
            $sql = "UPDATE `gallery` SET `gallery_image__blazeweb` = '$file_name' where `gallery_id__blazeweb` = '$gallery_id'";
            if(!($con->query($sql)==TRUE)){
                $success = false;
            }
        }
    }
    if($success){
        $gallery_id = $_POST["gallery_id"];
        $text = $_POST["gallery_text"];
        $cat = $_POST["gallery_category"];
        // echo "gallery id " . $gallery_id . " text: ".$text . " cat: ".$cat;
        
        $sql = "UPDATE `gallery` SET `gallery_text__blazeweb` = '$text', `gallery_category__blazeweb` = '$cat' WHERE `gallery`.`gallery_id__blazeweb` = '$gallery_id';"; 
       if($con->query($sql)==TRUE){
           $success = true;
           $degree = (int) $_POST["rotation_degrees"];
           $degree *= -1;
           if($degree != 0){
               $sql = "select gallery_image__blazeweb from gallery where gallery_id__blazeweb = '$gallery_id'";
               $result = $con->query($sql);
               $row = $result->fetch_assoc();
               $img_name = $row["gallery_image__blazeweb"];
               $img_path = "../img/clubGallery/" . $img_name;
               $source = imagecreatefromjpeg($img_path);
               $rotate = imagerotate($source, $degree, 0);
               $new_name = generateRandomString() . substr($row["gallery_image__blazeweb"],10);
               $new_path = "../img/clubGallery/" . $new_name;
               imagejpeg($rotate, $new_path);       
               unlink($img_path);
               //  rotate thumb

               $t_img_path = "../img/clubGallery/" . $img_name . "-thumb.jpg";
               $t_source = imagecreatefromjpeg($t_img_path);
               $t_rotate = imagerotate($t_source, $degree, 0);
               $t_new_name = $new_name . "-thumb.jpg";
               $t_new_path = "../img/clubGallery/" . $t_new_name;
               imagejpeg($rotate, $t_new_path);       
               unlink($t_img_path);

               // Update DB
               $sql = "UPDATE `gallery` SET `gallery_image__blazeweb` = '$new_name' where `gallery_id__blazeweb` = '$gallery_id'";
               if(!($con->query($sql)==TRUE)){
                   $success = false;
               }
           }
    
            header("Location: gallery.php");
       }
       else{
        header("Location: gallery.php?success=false");
        
       }
    }
}

if(isset($_POST["add_gallery"])){
    $file_name = "";
    if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 ){
        $allowed = array('png', 'jpg', 'gif','jpeg');
        $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($extension), $allowed)){
            $success = false;
            $error = 1;
        }
        $file_name = generateRandomString()."-" . $_FILES['upl']['name'];
        if(!(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/clubGallery/'.$file_name))){
            $success = false;
            $error = 2;
        }
        $file_temp_name = compress_and_resize_image('../img/clubGallery/'.$file_name, '../img/clubGallery/'.$file_name, 85, 1000,1000);
        // add thumb
        $file_thumb = compress_and_resize_image('../img/clubGallery/'.$file_name, '../img/clubGallery/'.$file_name."-thumb.jpg", 50, 640,500);       
    }
    if($success){
        $text = $_POST["gallery_text"];
        $cat = $_POST["gallery_category"];
        //gallery_background_position__blazeweb
       $sql = "INSERT INTO `gallery` (`gallery_id__blazeweb`, `gallery_text__blazeweb`, `gallery_category__blazeweb`, `gallery_image__blazeweb`) VALUES (NULL, '$text', '$cat', '$file_name');"; 
       if($con->query($sql)==TRUE){
           $success = true;
           $degree = (int) $_POST["rotation_degrees"];
           $degree *= -1;
           if($degree != 0){
               $gallery_id = $con->insert_id;
               $sql = "select gallery_image__blazeweb from gallery where gallery_id__blazeweb = '$gallery_id'";
               $result = $con->query($sql);
               $row = $result->fetch_assoc();
               $img_name = $row["gallery_image__blazeweb"];
               $img_path = "../img/clubGallery/" . $img_name;
               $source = imagecreatefromjpeg($img_path);
               $rotate = imagerotate($source, $degree, 0);
               $new_name = generateRandomString() . substr($row["gallery_image__blazeweb"],10);
            //    echo "$new_name";
               $new_path = "../img/clubGallery/" . $new_name;
               imagejpeg($rotate, $new_path);       
               unlink($img_path);

            //  rotate thumb

                $t_img_path = "../img/clubGallery/" . $img_name . "-thumb.jpg";
                $t_source = imagecreatefromjpeg($t_img_path);
                $t_rotate = imagerotate($t_source, $degree, 0);
                $t_new_name = $new_name . "-thumb.jpg";
                $t_new_path = "../img/clubGallery/" . $t_new_name;
                imagejpeg($t_rotate, $t_new_path);       
                unlink($t_img_path);

                // Update DB
               $sql = "UPDATE `gallery` SET `gallery_image__blazeweb` = '$new_name' where `gallery_id__blazeweb` = '$gallery_id'";
               if(!($con->query($sql)==TRUE)){
                   $success = false;
               }
           }

            header("Location: gallery.php");
       }
       else{
        header("Location: gallery.php?success=fsalse");
        
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
                            <small class="muted">Gallery</small>
                        </h1>
                        <div id="container" class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary" data-toggle='modal' data-target='#gallery_add_modal'>Add Photo</button><br/><br/>
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
                                            <th data-filterable="true" data-sortable="true" >#</th>
                                            <th data-filterable="true" data-sortable="true">Text</th>
                                            <!-- <th data-filterable="true" data-sortable="true">Added Date</th> -->
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>View/Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //Display Players
                                        $sql = "SELECT * from gallery ORDER BY gallery_id__blazeweb desc";
                                        $result = $con->query($sql);
                                        if($result->num_rows>0){
                                            $count=0;
                                            while($row = $result->fetch_assoc()){
                                                $count++;
                                                $p_id = $row["gallery_id__blazeweb"];
                                                $p_text = $row['gallery_text__blazeweb'];
                                                $p_image = $row['gallery_image__blazeweb'];
                                                $p_cat = (int) $row['gallery_category__blazeweb'];
                                                $p_category_text = "";
                                                if($p_cat == 1){
                                                    $p_category_text = "Game";
                                                }
                                                else if($p_cat == 2){
                                                    $p_category_text = "Players";
                                                }
                                                else if($p_cat == 3){
                                                    $p_category_text = "Staff";
                                                }
                                                else if($p_cat == 4){
                                                    $p_category_text = "Others";
                                                }
                                                else{
                                                    $p_category_text = "Unknown";
                                                }
                                                echo "<tr>";
                                                echo "<th scope='row'>{$count}</th>";
                                                echo "<td>{$p_text}</td>";
                                                echo "<td><img width='100' src='../img/clubGallery/{$p_image}'></img></td>";
                                                echo "<td>{$p_category_text}</td>";
                                                echo "<td><a id='show-gallery-edit-modal' href='#' type='button' class='' data-toggle='modal' data-id='$p_id' data-target='#gallery_edit_modal' data-text='$p_text'  data-image='$p_image' data-cat='$p_cat' data-cattext='$p_category_text'  >View/Edit</a></td>";
                                                echo "<td><a href='gallery.php?delete={$p_id}'>Delete</a></td>";
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
    <div class="modal fade" id="gallery_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">View/Edit Gallery Image</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="gallery-text" name="gallery_text">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Category:</label>
                        <select type="text" class="form-control" id="gallery-category" name="gallery_category">
                            <option id="gallery-game" value="1">Game</option>
                            <option id="gallery-players" value="2">Players</option>
                            <option id="gallery-staff" value="3">Staff</option>
                            <option id="gallery-others" value="4">Others</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Image:</label>
                                <img src="" width="250" class="img-rotate focus-image" id="gallery-image" alt="">
                                <!-- <input type="text" class="form-control" id="player-image" name="gallery_image"> -->
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group" id="upload">
                                    <label for="title" class="col-form-label">Upload different image:</label>
                                        <input class="focus-image-upload" type="file" accept="image/*" name="upl" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="rotation-div" style="display:none;">
                        <div class="col-md-1">
                            <input type="text" value="0" id="rotation-degrees" style="display:none" name="rotation_degrees" >
                        </div>
                        <div class="col-md-4">
                            <button data-rotation-for="gallery-image" data-degree-tag="rotation-degrees" data-direction="left" style="marign:0 auto;display" class="btn btn-warning rotate-image-button" ><i class="fa fa-rotate-left"></i></button>                            
                            <button data-rotation-for="gallery-image" data-degree-tag="rotation-degrees" data-direction="right" style="marign:0 auto;" class="btn btn-warning rotate-image-button" ><i class="fa fa-rotate-right"></i></button>                                                     
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    
                    <input style="display:none;" type="text" class="d-none" name="gallery_id" id="gallery-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_gallery" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="gallery_add_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Add Photo</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                <div class="form-group">
                        <label for="title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="gallery-text2" name="gallery_text">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Category:</label>
                        <select type="text" class="form-control" id="gallery-category2" name="gallery_category">
                            <option value="1">Game</option>
                            <option value="2">Players</option>
                            <option value="3">Staff</option>
                            <option value="4">Others</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="col-form-label">Image:</label>
                                <img src="" width="250" class="img-rotate focus-image" id="gallery-image2" alt="">
                                <!-- <input type="text" class="form-control" id="player-image" name="gallery_image"> -->
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group" id="upload">
                                    <label for="title" class="col-form-label">Upload different image:</label>
                                        <input class="focus-image-upload" type="file" accept="image/*" name="upl" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="rotation-div2" style="display:none;">
                        <div class="col-md-1">
                            <input type="text" value="0" id="rotation-degrees2" style="display:none" name="rotation_degrees" >
                        </div>
                        <div class="col-md-4">
                            <button data-rotation-for="gallery-image2" data-degree-tag="rotation-degrees2" data-direction="left" style="marign:0 auto;display" class="btn btn-warning rotate-image-button" ><i class="fa fa-rotate-left"></i></button>                            
                            <button data-rotation-for="gallery-image2" data-degree-tag="rotation-degrees2" data-direction="right" style="marign:0 auto;" class="btn btn-warning rotate-image-button" ><i class="fa fa-rotate-right"></i></button>                                                     
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_gallery" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script src="js/jquery-rotate.min.js"></script> -->
<script>
    var linkElement = document.createElement("link");
    linkElement.rel = "stylesheet";
    linkElement.href = "image_uploader/assets/css/style.css"; //Replace here
    document.head.appendChild(linkElement);

    
    $(".rotate-image-button").click(function(e) {
        e.preventDefault();
        var rotationFor = $(this).data("rotation-for");
        var rotationDirection =( $(this).data("direction") == "left" ? -1 : 1);
        var degreeTag = $(this).data("degree-tag");
        var degree = $("#"+degreeTag).val();
        rotation = (parseInt(degree) + (90*rotationDirection)) % 360; // the mod 360 probably isn't needed
        console.log(rotation);
        $("#"+degreeTag).val(rotation);
        $("#"+rotationFor).css('transform','rotate(' + rotation + 'deg)');
        $("#"+rotationFor).css('margin-top','30px');
        $("#"+rotationFor).css('margin-bottom','30px');
        $("#"+rotationFor).css('margin-left','30px');
    });
    $("#gallery-image").load(function(){
        $("#rotation-div").css("display","block");
    });
    $("#gallery-image2").load(function(){
        $("#rotation-div2").css("display","block");
    }); 
    
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css';
    document.head.appendChild(link);

    // var link2 = document.createElement('link');
    // link2.rel = 'stylesheet';
    // link2.href = 'css/timepicki.css';
    // document.head.appendChild(link2);

    var link3 = document.createElement('link');
    link3.rel = 'stylesheet';
    link3.href = 'css/waitMe.min.css';
    document.head.appendChild(link3);
</script>
<script src="js/jquery-ui.js"></script>
<!-- <script type='text/javascript'src='js/timepicki.js'></script> -->
<script src="js/waitMe.min.js"></script>
<script src="js/gallery.js"></script>
<script type="text/javascript" src="js/jquery.focuspoint.helper-basic.js"></script>

<script src="js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="js/plugins/datatables/DT_bootstrap.js"></script>

  <script src="js/target-admin.js"></script>

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