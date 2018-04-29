<?php 
// $server = "	sql301.epizy.com";
// $username  = "epiz_21907494";
// $password = "realmadrid94";
// $dbName = "epiz_21907494_fhbasketball_db";
$server = "localhost";
$username  = "root";
$password = "";
$dbName = "fhbasketball";
$con = "";
$con = new mysqli($server, $username, $password);
if($con->connect_error){
    echo "connection error! <br>";
}

$sql = "USE " .$dbName;
if($con->query($sql) == TRUE){
    echo "Database selected <hr>";
}
else{
    echo "Database selection error<hr>";
}

$sql = "CREATE TABLE users(
    user_id__blazeweb int(5) primary key AUTO_INCREMENT,
    user_firstname__blazeweb varchar(50) NOT NULL,
    user_lastname__blazeweb varchar(50) NOT NULL,
    user_email__blazeweb varchar(50) NOT NULL,
    user_phone__blazeweb BIGINT NOT NULL,
    user_address__blazeweb text,
    user_image__blazeweb text,
    user_type__blazeweb varchar(20)
)";

if($con->query($sql) == TRUE){
    echo "users table created<hr>";
}
else{
    echo "users table creation failed<hr>";
}

$sql = "CREATE table athletes(
    athlete_id__blazeweb int(5) primary key AUTO_INCREMENT,
    athlete_user_id__blazeweb int(5) NOT NULL,
    athlete_gender__blazeweb varchar(6) NOT NULL,
    athlete_sport__blazeweb varchar(50) NOT NULL,
    athlete_positionsplayed__blazeweb text NOT NULL,
    athlete_travelteam__blazeweb varchar(255) NOT NULL,
    athlete_highschool__blazeweb varchar(255) NOT NULL,
    athlete_jerseynumber__blazeweb int(3) NOT NULL,
    athlete_gpa__blazeweb varchar(10) NOT NULL,
    athlete_act__blazeweb varchar(255) NOT NULL,
    athlete_parent_name__blazeweb varchar(50) NOT NULL,
    athlete_parent_email__blazeweb varchar(50) NOT NULL,
    athlete_hudllink1__blazeweb varchar(50),
    athlete_hudllink2__blazeweb varchar(50),
    athlete_hudllink3__blazeweb varchar(50),
    FOREIGN KEY (athlete_user_id__blazeweb) REFERENCES users(user_id__blazeweb)
)";
if($con->query($sql) == TRUE){
    echo "athletes table created<hr>";
}
else{
    echo "athletes table creation failed<hr>";
}
$sql = "CREATE table athlete_awards(
    award_id__blazeweb int(5) primary key NOT NULL AUTO_INCREMENT,
    award_athelete_id__blazeweb int(5) NOT NULL,
    award_title__blazeweb varchar(255) NOT NULL,
    award_year__blazeweb year(4) NOT NULL,
    award_givenby__blazeweb varchar(255),
    foreign key (award_athelete_id__blazeweb) references athletes(athlete_id__blazeweb)
)";
if($con->query($sql) == TRUE){
    echo "awards table created<hr>";
}
else{
    echo "awards table creation failed<hr>";
}

$sql = "CREATE table coaches(
    coach_id__blazeweb int(5) primary key AUTO_INCREMENT,
    coach_user_id__blazeweb int(5) NOT NULL,
    coach_collegename__blazeweb varchar(255) NOT NULL,
    foreign key (coach_user_id__blazeweb) references users(user_id__blazeweb)
)";
if($con->query($sql) == TRUE){
    echo "coaches table created<hr>";
}
else{
    echo "coaches table creation failed<hr>";
}

$sql = "CREATE TABLE team_players(
    player_id__blazeweb int(5) primary key AUTO_INCREMENT,
    player_firstname__blazeweb varchar(50) NOT NULL,
    player_lastname__blazeweb varchar(50) NOT NULL,
    player_positions__blazeweb text NOT NULL,
    player_jerseyNumber__blazeweb varchar(2) NOT NULL,
    player_height__blazeweb varchar(10) NOT NULL,
    player_weight__blazeweb varchar(10) NOT NULL,
    player_image__blazeweb text,
    player_sypnosis__blazeweb text
)";
if($con->query($sql) == TRUE){
    echo "players table created<hr>";
}
else{
    echo "players table creation failed<hr>";
}

$sql = "CREATE TABLE player_topschools(
    topschool_id__blazeweb int(5) primary key AUTO_INCREMENT,
    topschool_player_id__blazeweb int(5) NOT NULL,
    school1__blazeweb varchar(255),
    school2__blazeweb varchar(255),
    school3__blazeweb varchar(255),
    school4__blazeweb varchar(255),
    school5__blazeweb varchar(255),
    school6__blazeweb varchar(255),
    school7__blazeweb varchar(255),
    school8__blazeweb varchar(255),
    school9__blazeweb varchar(255),
    school10__blazeweb varchar(255),
    foreign key (topschool_player_id__blazeweb) references team_players(player_id__blazeweb)

)";
if($con->query($sql) == TRUE){
    echo "player_topschools table created<hr>";
}
else{
    echo "player_topschools table creation failed<hr>";
}

$sql = "CREATE table schedules(
    schedule_id__blazeweb int(5) primary key NOT NULL AUTO_INCREMENT,
    schedule_date__blazeweb date NOT NULL,
    schedule_time__blazeweb time NOT NULL,
    schedule_venue__blazeweb varchar(255) NOT NULL,
    schedule_played__blazeweb varchar(20) DEFAULT 'No',
    schedule_result__blazeweb varchar(20) DEFAULT 'NA',
    schedule_opponent__blazeweb varchar(255)
)";
if($con->query($sql) == TRUE){
    echo "schedules table created<hr>";
}
else{
    echo "schedules table creation failed<hr>";
}

$sql = "CREATE table gallery(
    gallery_id__blazeweb int(5) primary key NOT NULL AUTO_INCREMENT,
    gallery_image__blazeweb text NOT NULL,
    gallery_category__blazeweb	int(1) DEFUALT '1',
    gallery_text__blazeweb text
)";
if($con->query($sql) == TRUE){
    echo "gallery table created<hr>";
}
else{
    echo "gallery table creation failed<hr>";
}

$sql = "CREATE table sponsors(
    sponsor_id__blazeweb int(5) primary key NOT NULL AUTO_INCREMENT,
    sponsor_image__blazeweb text NOT NULL,
    sponsor_name__blazeweb varchar(100) NOT NULL,
    sponsor_url__blazeweb varchar(255),
    sponsor_text__blazeweb text,
    sponsor_level__blazeweb int DEFAULT '1'    
)";
if($con->query($sql) == TRUE){
    echo "sponsors table created<hr>";
}
else{
    echo "sponsors table creation failed<hr>";
}

$sql = "CREATE table stats(
    stat_id__blazeweb int(1) NOT NULL primary key,
    stat_coaches__blazeweb int,
    stat_games__blazeweb int,
    stat_won__blazeweb int    
)";
if($con->query($sql) == TRUE){
    echo "stats table created<hr>";
}
else{
    echo "stats table creation failed<hr>";
}


//INSERT INTO `gallery` (`gallery_id__blazeweb`, `gallery_image__blazeweb`, `gallery_text__blazeweb`) VALUES (NULL, 'IMG_0836', 'Players planning the game.');
//INSERT INTO `schedules` (`schedule_id__blazeweb`, `schedule_date__blazeweb`, `schedule_time__blazeweb`, `schedule_venue__blazeweb`, `schedule_played__blazeweb`, `schedule_result__blazeweb`, `schedule_opponent__blazeweb`) VALUES (NULL, '2018-04-12', '15:00:00', 'Away', 'Yes', '46-103', 'Some Team'), (NULL, '2018-04-20', '13:00:00', 'Home', 'No', 'NA', 'Other Team'), (NULL, '2018-04-13', '14:00:00', 'Home', 'Yes', '88-92', 'A team'), (NULL, '2018-04-10', '15:00:00', 'Home', 'Yes', '64-61', 'One Team'), (NULL, '2018-04-15', '11:30:00', 'Away', 'No', 'NA', 'Unknown Team'), (NULL, '2018-04-17', '18:00:00', 'Away', 'No', 'NA', 'That Team');
//INSERT INTO `team_players` (`player_id__blazeweb`, `player_firstname__blazeweb`, `player_lastname__blazeweb`, `player_positions__blazeweb`, `player_height__blazeweb`, `player_weight__blazeweb`, `player_image__blazeweb`, `player_sypnosis__blazeweb`) VALUES (NULL, 'Collins', 'Eguavoen', 'PG', '1.73', '183', NULL, NULL), (NULL, 'Adam', 'Bowley', 'PF', '1.78', '175', NULL, NULL), (NULL, 'Sam', 'Scott', 'SG', '1.85', '180', NULL, NULL), (NULL, 'Chris', 'Baker', 'C', '1.85', '178', NULL, NULL), (NULL, 'Ali', 'Hugo', 'PF', '1.81', '186', NULL, NULL);
//INSERT INTO `sponsors` (`sponsor_id__blazeweb`, `sponsor_image__blazeweb`, `sponsor_name__blazeweb`, `sponsor_text__blazeweb`, `sponsor_level__blazeweb`) VALUES (NULL, 'nike_logo.jpg', 'Nike', 'One of the best in sports manufacturing. Nike has been supporting us since the beginning.', '1'), (NULL, 'redbull_logo.jpg', 'Redbull', 'Redbull gives you wings! When the players are tired its redbull that gives them the energy.', '1'), (NULL, 'kia_logo.jpg', 'KIA', 'The best in auto mobiles. KIA is a recent sponsor and a very generous one.', '1');
//UPDATE `sponsors` SET `sponsor_url__blazeweb` = 'https://www.nike.com' WHERE `sponsors`.`sponsor_id__blazeweb` = 1; UPDATE `sponsors` SET `sponsor_url__blazeweb` = 'https://www.redbull.com' WHERE `sponsors`.`sponsor_id__blazeweb` = 2; UPDATE `sponsors` SET `sponsor_url__blazeweb` = 'https://www.kia.com' WHERE `sponsors`.`sponsor_id__blazeweb` = 3;
//ALTER TABLE `sponsors` ADD `sponsor_imagetype__blazeweb` VARCHAR(10) NOT NULL DEFAULT '.jpg' AFTER `sponsor_image__blazeweb`;
//UPDATE `sponsors` SET `sponsor_image__blazeweb` = 'nike_logo' WHERE `sponsors`.`sponsor_id__blazeweb` = 1; UPDATE `sponsors` SET `sponsor_image__blazeweb` = 'redbull_logo' WHERE `sponsors`.`sponsor_id__blazeweb` = 2; UPDATE `sponsors` SET `sponsor_image__blazeweb` = 'kia_logo' WHERE `sponsors`.`sponsor_id__blazeweb` = 3;
//INSERT INTO `gallery` (`gallery_id__blazeweb`, `gallery_image__blazeweb`, `gallery_category__blazeweb`, `gallery_text__blazeweb`) VALUES (NULL, 'attachment_180407022953.jpg', '2', 'A very motivated young player');
// ALTER TABLE `users` ADD `user_username__blazeweb` VARCHAR(20) NOT NULL AFTER `user_id__blazeweb`, ADD `user_password__blazeweb` VARCHAR(20) NOT NULL AFTER `user_username__blazeweb`;

?>