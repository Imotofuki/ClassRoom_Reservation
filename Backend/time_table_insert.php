<?php

include("dbConfig.php");

$week_num = $_GET['day_of_the_week'];
$college_name = $_GET['college_name'];
$room = $_GET['room'];
$period = $_GET['period'];



$insert = $db->query("INSERT INTO time_table_table (day_of_the_week, college_name, room_id, period_id) VALUES ('" . $week_num . "', '" . $college_name . "', '" . $room . "', '" . $period . "')");
header("Location:../Flont/Time_table/Registration/time_table_end.php");
?>