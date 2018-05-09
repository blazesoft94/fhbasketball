<?php
session_start();
    include "includes/header.php";
?>
<?php if(isset($_SESSION["admin_login"]) && $_SESSION["role"]=="admin"){?>
<?php 
//delete post
// deleteComment();
// changeCommentStatus();
$error = false;

if(isset($_GET["delete"])){
    $schedule_id = $_GET["schedule_id"];
    $sql = "DELETE FROM `schedules` WHERE `schedules`.`schedule_id__blazeweb` = '$schedule_id'";
    if($con->query($sql)==TRUE) {
        header("Location: schedule.php");
    }
}

if(isset($_POST["edit_schedule"]) || isset($_POST["add_schedule"])){
    $schedule_opponent = $_POST["schedule_opponent"];
    $schedule_result = $_POST["schedule_result"];
    $schedule_date = $_POST["schedule_date"];
    $schedule_played = $_POST["schedule_played"];
    $schedule_time = $_POST["schedule_time"];
    $schedule_venue = $_POST["schedule_venue"];
    $schedule_tname = $_POST["schedule_tname"];
    // if(empty($schedule_opponent) || empty($schedule_date) || empty($schedule_time) || empty($schedule_played) || empty($result) || empty($schedule_venue) ){
    //     $error = true;
    // }
    // else{
        $sql="";
        if(isset($_POST["edit_schedule"])){
            $schedule_id = $_POST["schedule_id"];
            $sql = "UPDATE `schedules` SET `schedule_date__blazeweb` = '$schedule_date',`schedule_tname__blazeweb` = '$schedule_tname', `schedule_time__blazeweb` = '$schedule_time', `schedule_venue__blazeweb` = '$schedule_venue', `schedule_played__blazeweb` = '$schedule_played', `schedule_result__blazeweb` = '$schedule_result', `schedule_opponent__blazeweb` = '$schedule_opponent' WHERE `schedules`.`schedule_id__blazeweb` = '$schedule_id';";
        }
        else if(isset($_POST["add_schedule"])){
            $sql = "INSERT INTO `schedules` (`schedule_id__blazeweb`, `schedule_date__blazeweb`, `schedule_time__blazeweb`, `schedule_venue__blazeweb`, `schedule_played__blazeweb`, `schedule_result__blazeweb`, `schedule_opponent__blazeweb`,`schedule_tname__blazeweb`) VALUES (NULL, '$schedule_date', '$schedule_time', '$schedule_venue', '$schedule_played', '$schedule_result', '$schedule_opponent','$schedule_tname');";
        }

        if($con->query($sql)==TRUE){
            header("Location: schedule.php");
        }
    // }
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
                            <small class="muted">Schedule</small>
                        </h1>
                        <div id="container" class="row">
                            <div class="col-md-12">
                                <button data-toggle="modal" data-target="#schedule_add_modal" class="btn btn-primary">Add Schedule</button><br/><br/>
                                <?php echo ($error) ? '<p class="text-danger">*Please fill all the values</p>' : "" ?>
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
                                    <thead>
                                        <tr>
                                            <th data-filterable="true" data-sortable="true">#</th>
                                            <th data-filterable="true" data-sortable="true">Played</th>
                                            <th data-filterable="true" data-sortable="true">Venue</th>
                                            <th data-filterable="true" data-sortable="true">Opponent</th>
                                            <th data-filterable="true" data-sortable="true">Result</th>
                                            <th data-filterable="true" data-direction="desc" data-sortable="true">Date</th>
                                            <th data-filterable="true" data-sortable="true">Time</th>
                                            <th data-filterable="true" data-sortable="true">Tournament Name</th>
                                            <th data-filterable="true" data-sortable="true">Edit</th>
                                            <th data-filterable="true" data-sortable="true">Delete</th>
                                            <!-- <th>Competition</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //Display Posts
                                        $sql = "SELECT * from schedules order by schedule_id__blazeweb desc";
                                        $result = $con->query($sql);
                                        if($result->num_rows>0){
                                            $count=0;
                                            while($row = $result->fetch_assoc()){
                                                $count++;
                                                $s_id = $row['schedule_id__blazeweb'];
                                                $s_played = $row['schedule_played__blazeweb'];
                                                $s_venue = $row['schedule_venue__blazeweb'];
                                                $s_opponent = $row["schedule_opponent__blazeweb"];
                                                $s_result = $row['schedule_result__blazeweb'];
                                                // $s_competition = $row['schedule_competition__blazeweb'];
                                                $s_date = $row['schedule_date__blazeweb'];
                                                $s_time = $row['schedule_time__blazeweb'];
                                                $s_t_name = $row['schedule_tname__blazeweb'];
                                                echo "<tr>";
                                                echo "<th scope='row'>{$count}</th>";
                                                echo "<td>{$s_played}</td>";
                                                echo "<td>{$s_venue}</td>";
                                                echo "<td>{$s_opponent}</td>";
                                                echo "<td>{$s_result}</td>";
                                                echo "<td>{$s_date}</td>";
                                                echo "<td>{$s_time}</td>";
                                                echo "<td>{$s_t_name}</td>";
                                                echo "<td><a class='show-schedule-edit-modal' href='#' data-id='$s_id'  >Edit</a></td>";
                                                echo "<td><a href='schedule.php?delete=true&schedule_id={$s_id}'>Delete</a></td>";
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
                                <!-- end table responsive -->
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
<!-- EDIT MODAL -->
<div class="modal fade" id="schedule_edit_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">View/Edit Player</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Played:</label>
                        <select name="schedule_played" id="schedule-played">
                            <option class="played-no" value="No">No</option>
                            <option class="played-yes" value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Venue:</label>
                        <select name="schedule_venue" id="schedule-venue">
                            <option class="schedule-home" value="Home">Home</option>
                            <option class="schedule-away" value="Away">Away</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Tournament Name:</label>
                        <input type="text" class="form-control" id="schedule-tname" name="schedule_tname">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Opponent:</label>
                        <input type="text" class="form-control" id="schedule-opponent" name="schedule_opponent">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Result:</label>
                        <input type="text" class="form-control" id="schedule-result" name="schedule_result">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Date:</label>
                        <input class="form-control"  name="schedule_date" type="text" id="datepicker">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Time (e.g 16:40:00 ):</label>
                        <input id='timepicker' name="schedule_time" type='text' name='timepicker'/>
                    </div>
                    
                    <input style="display:none;" val="2" type="text" class="d-none" name="schedule_id" id="schedule-id">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_schedule" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="schedule_add_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="display:inline;" class="display-3 text-primary modal-title" id="exampleModalLabel">Add Schedule</h4>
                <button type="d-inline button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Played:</label>
                        <select name="schedule_played" id="">
                            <option class="played-no" value="No">No</option>
                            <option class="played-yes" value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Venue:</label>
                        <select name="schedule_venue" id="">
                            <option class="schedule-home" value="Home">Home</option>
                            <option class="schedule-away" value="Away">Away</option>
                        </select>
                    </div>
                   <div class="form-group">
                        <label for="title" class="col-form-label">Tournament Name:</label>
                        <input type="text" class="form-control" id="" name="schedule_tname">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Opponent:</label>
                        <input type="text" class="form-control" id="" name="schedule_opponent">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Result (NA if not played):</label>
                        <input type="text" class="form-control" id="" name="schedule_result">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Date:</label>
                        <input class="form-control datepicker"  name="schedule_date" type="text" id="datepicker2">
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Time (e.g 16:40:00 ):</label>
                        <input id='timepicker2' name="schedule_time" type='text' class='timepicker form-control'/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_schedule" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script src="js/jquery-3.2.0.min.js"></script> -->
<script>
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
<script src="js/schedule.js"></script>

<!-- <script src="js/libs/jquery-1.10.1.min.js"></script>
  <script src="js/libs/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="js/libs/bootstrap.min.js"></script> -->

<script src="js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="js/plugins/datatables/DT_bootstrap.js"></script>

  <script src="js/target-admin.js"></script>

<script>
    $(document).ready(function(){
        // $( "#datepicker" ).datepicker();
        $(".datepicker").datepicker(
         { dateFormat: "yy-mm-dd" }
        );

        //TIME PICKER
        $('.timepicker').timepicki({show_seconds:true});
        // $('#timepicker').timepicki();
    }); 
</script>

<?php
    include "includes/footer.php";
?>
<?php }
else{
    header("Location : login.php");
}
?>