<?php 
include_once "../includes/dbadmin.php";
$schedule_id = $_GET["schedule_id"];
$sql = "select * from schedules where schedule_id__blazeweb = $schedule_id";
$result = $con->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

?>