<?php

include ("../../Backend/dbConfig.php");

$select = $db->prepare("SELECT * FROM reservation_table WHERE status_id='1'");
$select->execute();
$allData = $select->fetchAll();

// var_dump($allData);

$count = count($allData);

// echo "<br>" . $count;

session_start();
if(strcmp($_SESSION['code'] , "student") == 0){
    $homeUrl = "../Index/mode_select_student.php";
} else{
    $homeUrl = "../Index/mode_select_teacher.php";
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約承認画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>予約の承認</h1>
    <div class="recognition">
        <table>
                <?php 

                if($count >= 1){

                    for ($i = 0; $i < $count; $i++){
                        $data = $allData[$i];

                        $leader_sql = $db->prepare("SELECT leader, college_id0, leader_year FROM member_table WHERE member_id='" . $data['member_id'] . "'");
                        $leader_sql->execute();
                        $leader = $leader_sql->fetch();

                        $college    =   $leader['college_id0'];

                        $sql = $db->prepare("SELECT room_name FROM room_table WHERE room_id='" . $data['room_id'] . "'");
                        $sql->execute();
                        $room = $sql->fetch();

                        $sql = $db->prepare("SELECT college_name FROM college_table WHERE college_id='" . $college . "'");
                        $sql->execute();
                        $college_name_ary = $sql->fetch();


                        $name           =   $leader['leader'];
                        $grade          =   $leader['leader_year'];
                        $college_name   =   $college_name_ary[0];
                        $date           =   $data['date_id'];
                        $period         =   $data['period_id'];
                        $room_name      =   $room[0];



                        echo("<tr>");
                        echo('<form action="../../Backend/recognition_back.php" method="get">');
                        echo('<td class="td1"><button class="Class_red_button">却下</button></td>');
                        echo('<input type="hidden" name="date" value="' . $date . '">'); 
                        echo('<input type="hidden" name="room" value="' . $data['room_id'] . '">'); 
                        echo('<input type="hidden" name="period" value="' . $period . '">'); 
                        echo('<input type="hidden" name="per" value="-1">'); 
                        echo('</form>');
                        echo('<td>予約者' . $i + 1 . '</td>'); 
                        echo('<td>' . $college_name . 'カレッジ ' . $grade . ' ' . $name . '</td>'); 
                        echo('<td>教室と日時</td>'); 
                        echo('<td>' . $date . ' <br>' . $period . '時間目 ' . $room_name . '教室</td>'); 
                        echo('<form action="../../Backend/recognition_back.php" method="get">');
                        echo('<td class="td1"><button class="Class_blue_button">承認</button></td>');
                        echo('<input type="hidden" name="date" value="' . $date . '">'); 
                        echo('<input type="hidden" name="room" value="' . $data['room_id'] . '">'); 
                        echo('<input type="hidden" name="period" value="' . $period . '">'); 
                        echo('<input type="hidden" name="per" value="1">'); 
                        echo('</form>');
                        echo("</tr>");    
                    }
                } else {
                    echo '<tr>';
                    echo '<td class="reservation">';
                    echo 'すべての仮予約が確認されました。';
                    echo '</td>';
                    echo '</tr>';
                }

                ?>
        </table>
    </div>
    <div class="home_button">
        <!-- セッションスコープからホーム画面へのリンクを張る -->
        <button class="Class_blue_button2" onclick="location.href='<?php echo $homeUrl; ?>'">
            <h3>ホームへ</h3>
        </button>
    </div>


</body>

</html>