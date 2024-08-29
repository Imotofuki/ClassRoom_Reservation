<?php

$preURL = $_SERVER['HTTP_REFERER'];

$date = "";
$room = 0;
$period = 0;
$backURL = "";

if (strpos($preURL, "room_pick.php") !== FALSE){
    $date = $_GET['date'];
    $room = $_GET['room'];
    $period = $_GET['period'];
    $backURL = '../../Backend/room_pick.php?date=\"' . $date . '\"';
} 
//
else{
    session_start();
    $code = $_SESSION['code'];
    $date = $_SESSION['date'];
    $room = $_SESSION['room'];
    $period = $_SESSION['period'];

    if(strcmp($code, "student") == 0){
        $backURL = "../Index/mode_select_student.php";
    } else{
        $backURL = "../Index/mode_select_teacher.php";
    }


}

// echo $backURL;

include("../../Backend/dbConfig.php");

$sql = $db->prepare("SELECT room_name FROM room_table WHERE room_id='" . $room . "'");
$sql->execute();
$room_name = $sql->fetch();

$select = $db->prepare("SELECT member_id FROM reservation_table WHERE date_id='" . $date . "' AND room_id='" . $room . "' AND period_id='" . $period . "'");
$select->execute();
$member = $select->fetch();
$member_id = $member[0];

$select = $db->prepare("SELECT leader FROM member_table WHERE member_id='" . $member_id . "'");
$select->execute();
$leader = $select->fetch();
$leader_name = $leader[0];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>取り消し確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="title">取り消す予約の確認</div>
    <u>
        <div class="delete_contents">
            <?php echo($date); ?><br>
            <?php echo($room_name[0]); ?>教室<br>
            <?php
            if ($period < 6){
                echo $period . "時間目";
            } else{
                echo("放課後");
            } 
            ?>
        </div>
    </u>

    <div class="subtitle">
        こちらの内容の予約を削除します。<br>
        よろしいですか？
    </div>


    <div class="foot">
        <button class="Class_blue_button2" onclick='location.href="<?php echo $backURL; ?>"'>いいえ</button>
        <button id="aleatbutton" class="Class_blue_button2">はい</button>
    </div>

    <script>
        function butotnClick(){
            let name = prompt('予約者名を入力してください');
            if (name === null){
                return ;
            }
            if (<?php echo "'" . $leader_name . "'" ; ?> == name){
                location.replace("../../Backend/delete.php<?php echo "?date=" . $date . "&room=" . $room . "&period=" . $period; ?>");
            } else {
                alert('入力した予約者名が異なります！');
            }
        }

        let button = document.getElementById('aleatbutton');
        button.addEventListener('click', butotnClick);
    </script>
</body>

</html>