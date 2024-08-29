<?php

include ("../../../Backend/dbConfig.php");

$room_id            = $_GET['room'];

$select = $db->prepare("SELECT room_name FROM room_table WHERE room_id='" . $room_id . "'");
$select->execute();
$room_name = $select->fetch();

$week = [
    "日曜日",
    "月曜日",
    "火曜日",
    "水曜日",
    "木曜日",
    "金曜日",
    "土曜日",
];


$day_of_the_week    = $_GET['day_of_the_week'];
$college_name       = $_GET['college_name'];
$period             = $_GET['period'];
$room_name = $room_name[0];



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>講義取消画面</title>
    <link rel="stylesheet" href="style.css">
    <div class="contents">
        <?php
            $week_name = $week[$day_of_the_week];

            echo('<form action="../../../Backend/time_table_delete.php" method="get">');
            echo("<u>".$week_name." <br>");
            echo($college_name."カレッジ <br>");
            echo($room_name."教室 <br>");
            if ($period == 6){
                echo("放課後");
            } else{
                echo($period."時間目");
            }
            echo "</u>";
        ?>
    </div>
    <div class="subtitle">この講義を取り消しますか？</div>
    <div class="foot">
        <input type="hidden" name="day_of_the_week" value="<?php echo $day_of_the_week; ?>">
        <input type="hidden" name="room_id"         value="<?php echo $room_id; ?>">
        <input type="hidden" name="period"          value="<?php echo $period; ?>">
        <?php
            echo('<button class="Class_blue_button3" type="button" onclick="location.href=\'../../../Backend/room_pick2.php?day_of_the_week='.$day_of_the_week.'\'">いいえ</button>');
            echo('<button class="Class_blue_button3" type="submit">はい</button>');
            echo("</form>");
        ?>
    </div>
</head>
<body>
    
</body>
</html>