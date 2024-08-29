<?php

include("dbConfig.php");

$date = $_GET['date'];
$room = $_GET['room'];
$period = $_GET['period'];

$delete = $db->query("UPDATE reservation_table SET status_id='0', member_id='0' WHERE date_id='" . $date . "' AND room_id='" . $room . "' AND period_id='" . $period . "'");
header("Location:../Flont/Delete/delete_end.php");

?>