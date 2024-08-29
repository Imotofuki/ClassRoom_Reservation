<?php

include ("dbConfig.php");

$date   = $_GET['date'];
$room   = $_GET['room'];
$period = $_GET['period'];
$per    = $_GET['per'];

echo $date;
echo $room;
echo $period;
echo $per;

if ($per == 1){
    //承認
    $update = $db->query("UPDATE reservation_table SET status_id='2' WHERE date_id='". $date ."' AND room_id='". $room ."' AND period_id='". $period ."'");
    header("Location:../Flont/Recognition/recognition.php");
} else{
    //拒否
    $update = $db->query("UPDATE reservation_table SET status_id='0', member_id='0' WHERE date_id='". $date ."' AND room_id='". $room ."' AND period_id='". $period ."'");
    header("Location:../Flont/Recognition/recognition.php");
}

?>