<?php 
include_once "../includes/dbadmin.php";
$player_id = $_GET["player_id"];
$sql = "select * from team_players where player_id__blazeweb = $player_id";
$result = $con->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

?>