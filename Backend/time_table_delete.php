<?php

$day_of_the_week = $_GET['day_of_the_week'];
$room_id         = $_GET['room_id'];
$period          = $_GET['period'];

echo $day_of_the_week;
echo $room_id;
echo $period;

include ("dbConfig.php");

$delete = $db->prepare("DELETE FROM time_table_table WHERE day_of_the_week='".$day_of_the_week."' AND room_id='".$room_id."' AND period_id='".$period."'");
$delete->execute();

header("Location:../Flont/Time_table/Delete/delete_end.php");
?>