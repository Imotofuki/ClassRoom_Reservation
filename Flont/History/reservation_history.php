<?php

    include ("../../Backend/dbConfig.php");

    $date = $_GET['date'];
    $room = $_GET['room'];
    $period = $_GET['period'];

    $select = $db->prepare("SELECT member_id FROM reservation_table WHERE date_id='" . $date . "' AND room_id='" . $room . "' AND period_id='" . $period . "'");
    $select->execute();
    $member_id = $select->fetch(); 

    $select = $db->prepare("SELECT * FROM member_table WHERE member_id='" . $member_id[0] . "'");
    $select->execute();
    $memberAll = $select->fetch();

    $sql = $db->prepare("SELECT room_name FROM room_table WHERE room_id='" . $room . "'");
    $sql->execute();
    $room_name = $sql->fetch();

    

    $count = $memberAll[1];
    $grade = [];
    $human = [];
    $room_name = $room_name[0];
    $college_name = [];

    for ($i = 0; $i < $count; $i++){
        $college_id = $memberAll[($i * 3) + 2];

        $sql = $db->prepare("SELECT college_name FROM college_table WHERE college_id='" . $college_id . "'");
        $sql->execute();
        $college_name_ary = $sql->fetch();

        $college_name[] = $college_name_ary[0];

        $grade[] = $memberAll[($i * 3) + 3];
        $human[] = $memberAll[($i * 3) + 4];
    }

    // echo $room_name;

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>履歴画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="title">予約履歴</div>
    
    <u>
        <div class="room">
            <?php echo $room_name; ?>教室<br>
            <?php echo $date; ?><br>
            <?php
            if ($period < 6){
                echo $period . "時間目";
            } else{
                echo("放課後");
            } 
            ?>
            <br>
        </div>
        </u>
   

    <div class="subtitle">予約者</div>
    <div class="leader">
        <?php echo($college_name[0]); ?>カレッジ <?php echo($grade[0]." ".$human[0]); ?> <br>
    </div>
    <div class="subtitle">利用メンバー</div>
    <div class="member">
        <?php 
            for ($i = 1; $i < $count; $i++){
                echo ($college_name[$i] . "カレッジ " . $grade[$i] . " " . $human[$i] . "<br>");
            }
        ?>
    </div>
    <div class="foot">
        <button class="Class_blue_button2" type="button"
            onclick='location.href="../../Backend/room_pick.php?date=\"<?php echo $date; ?>\""'>戻る</button>
        <button class="Class_blue_button2" type="button" onclick='location.href="../Index/mode_select_teacher.php"'>ホームへ</button>
    </div>
</body>

</html>