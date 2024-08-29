<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教室選択</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
</head>

<body>

    <div class="header">
        <button onclick="location.href='date_pick.php'" class="btn">戻る</button>

    </div>

    <?php


    // if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //     $selectedDate = $_POST["selected_date"];
    //     echo ($selectedDate);
    //     echo "いけてますよ";
    //     // ここで選択された日付を使って何か処理を行う
    // }

    $nine = [
        "B 101",
        "B 104",
        "B 112",
        "B 113",
        "901"
    ];
    $ten = [
        "1001",
        "1002",
        "1003",
        "1004",
        "1005",
        "1006",
        "1007",
        "1008",
        "1009",
        "1010",
        "1011",
        "1012",
        "1013",
        "1014"
    ];
    $eleven = [
        "1101",
        "1102",
        "1103",
        "1104",
        "1105",
        "1106",
        "1107",
        "1108",
        "1109",
        "1110",
        "1111",
        "1112",
        "1113"
    ];
    $twelve = [
        "1201",
        "1202",
        "1204",
        "1206",
        "1207"
    ];
    

    include ('dbConfig.php');

    // echo (count($nine) + count($ten) + count($eleven) + count($twelve));

    $res_button_values = "予約";
    $button_stats = 0;

    session_start();
    $mode = $_SESSION['mode'];

    

    switch($mode){
        case 1:
            // echo "mode1";
            $button_stats = [0];
            $next_url = "../Flont/Reservation/reservation_input_member.php";
            break;
        case 2:
            // echo "mode2";
            $res_button_values = "予約取消";
            $button_stats = [1,2];
            $next_url = "../Flont/Delete/delete_check.php";
            break;
        case 4:
            // echo "mode4";
            $res_button_values = "予約情報";
            $button_stats = [1,2];
            $next_url = "../Flont/History/reservation_history.php";
            break;
        default:
            echo("Error");
            break;
    }

    // $date = strtotime((string)$_GET['date']);
    
    // $date1 = new Datetime($_GET['date']);

    // $date = $date1->format("Y-m-d");

    // echo gettype($date);

    // 

    if ($mode <= 4){
        $date = (string)$_GET['date'];

        $sql = $db->prepare("SELECT period_id, room_id, status_id FROM reservation_table WHERE date_id = " . $date);
        $sql->execute();
        $room_data = $sql->fetchAll();
    }    
    

    // echo $room_data[1][1];

    // foreach($room_data as $rm){
    //     echo $rm['room_id'] . " : " . $rm['period_id'];
    //     echo "<br>";
    // }

    $room_youso = 0;
    $table_cnt = 0;

    $dateString = trim($date, '"');
    $datetime = new DateTime($dateString);
    $w = $datetime->format("w");

    $select = $db->prepare("SELECT room_id, period_id, college_name FROM time_table_table WHERE day_of_the_week='". $w ."'"  . " ORDER BY room_id ASC, period_id ASC");
    $select->execute();
    $time_table_data = $select->fetchAll();

    $tm_room = [];
    $tm_period = [];
    $tm_college = [];
    $tm_cnt = 0;

    foreach($time_table_data as $data){
        $tm_room[]    = $data[0];
        $tm_period[]  = $data[1];
        $tm_college[] = $data[2];
    }

    $tm_room[]      = -1;
    $tm_period[]    = -1;
    $tm_college[]   = "";
    
    echo "<div class='table'>";
    
    foreach($room_data as $rm){
        if ($rm['room_id'] <= 5){
            if ($table_cnt == 0){
                $table_cnt++;
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>地下・９階</th>";
                echo "<th>1時間目</th>";
                echo "<th>2時間目</th>";
                echo "<th>3時間目</th>";
                echo "<th>4時間目</th>";
                echo "<th>5時間目</th>";
                echo "<th>放課後</th>";
                echo "</tr>";
            }
            //ルームの開始時
            if($rm['period_id'] == 1){
                echo "<tr>";
                echo "<th>" . $nine[$room_youso] . "</th>";
            }
            echo "<td>";
            
            //ステータスでボタンか✖を設置
            //in_arrayで要素があると確認した場合はifに進む
            if ($tm_room[$tm_cnt] == $rm['room_id'] && $tm_period[$tm_cnt] == $rm['period_id']){
                echo '<div class="button5">'.$tm_college[$tm_cnt].'</div>';
                $tm_cnt++;
            }
            else if(in_array($rm['status_id'], $button_stats)){
                //青色のボタン
                echo '<form method="get" action="' . $next_url . '">';
                echo '<input type="hidden" name="period" value="' . $rm['period_id'] . '">';
                echo '<input type="hidden" name="date" value=' . $date . '>';
                echo '<button class="button1" name="room" value="' . $rm['room_id'] . '">' . $res_button_values . '</button>';
                echo '<input type="hidden" name="empty" value="0">';
                
                echo '</form>';
            } else{
                //✖ボタン
                echo '<div class="button2">X</div>';
            }

            echo "</td>";

            //ルームの終了時
            if($rm['period_id'] == 6){
                echo "</tr>";
                $room_youso++;
            }

        }
        else if ($rm['room_id'] <= 19){
            if ($table_cnt == 1){
                $room_youso = 0;
                $table_cnt++;
                echo "</table>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>１０階</th>";
                echo "<th>1時間目</th>";
                echo "<th>2時間目</th>";
                echo "<th>3時間目</th>";
                echo "<th>4時間目</th>";
                echo "<th>5時間目</th>";
                echo "<th>放課後</th>";
                echo "</tr>";
            }
            //ルームの開始時
            if($rm['period_id'] == 1){
                echo "<tr>";
                echo "<th>" . $ten[$room_youso] . "</th>";
            }
            echo "<td>";
            
            //ステータスでボタンか✖を設置
            //in_arrayで要素があると確認した場合はifに進む
            if ($tm_room[$tm_cnt] == $rm['room_id'] && $tm_period[$tm_cnt] == $rm['period_id']){
                echo '<div class="button5">'.$tm_college[$tm_cnt].'</div>';
                $tm_cnt++;
            }
            else if(in_array($rm['status_id'], $button_stats)){
                //青色のボタン
                echo '<form method="get" action="' . $next_url . '">';
                echo '<input type="hidden" name="period" value="' . $rm['period_id'] . '">';
                echo '<input type="hidden" name="date" value=' . $date . '>';
                echo '<button class="button1" name="room" value="' . $rm['room_id'] . '">' . $res_button_values . '</button>';
                echo '<input type="hidden" name="empty" value="0">';
                
                echo '</form>';
            } else{
                //✖ボタン
                echo '<div class="button2">X</div>';
            }

            echo "</td>";

            //ルームの終了時
            if($rm['period_id'] == 6){
                echo "</tr>";
                $room_youso++;
            }
            
        }
        else if ($rm['room_id'] <= 32){
            if ($table_cnt == 2){
                $room_youso = 0;
                $table_cnt++;
                echo "</table>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>１１階</th>";
                echo "<th>1時間目</th>";
                echo "<th>2時間目</th>";
                echo "<th>3時間目</th>";
                echo "<th>4時間目</th>";
                echo "<th>5時間目</th>";
                echo "<th>放課後</th>";
                echo "</tr>";
            }
            //ルームの開始時
            if($rm['period_id'] == 1){
                echo "<tr>";
                echo "<th>" . $eleven[$room_youso] . "</th>";
            }
            echo "<td>";
            
            //ステータスでボタンか✖を設置
            //in_arrayで要素があると確認した場合はifに進む
            if ($tm_room[$tm_cnt] == $rm['room_id'] && $tm_period[$tm_cnt] == $rm['period_id']){
                echo '<div class="button5">'.$tm_college[$tm_cnt].'</div>';
                $tm_cnt++;
            }
            else if(in_array($rm['status_id'], $button_stats)){
                //青色のボタン
                echo '<form method="get" action="' . $next_url . '">';
                echo '<input type="hidden" name="period" value="' . $rm['period_id'] . '">';
                echo '<input type="hidden" name="date" value=' . $date . '>';
                echo '<button class="button1" name="room" value="' . $rm['room_id'] . '">' . $res_button_values . '</button>';
                echo '<input type="hidden" name="empty" value="0">';
                
                echo '</form>';
            } else{
                //✖ボタン
                echo '<div class="button2">X</div>';
            }

            echo "</td>";

            //ルームの終了時
            if($rm['period_id'] == 6){
                echo "</tr>";
                $room_youso++;
            }
            
        }
        else {
            if ($table_cnt == 3){
                $room_youso = 0;
                $table_cnt++;
                echo "</table>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>１２階</th>";
                echo "<th>1時間目</th>";
                echo "<th>2時間目</th>";
                echo "<th>3時間目</th>";
                echo "<th>4時間目</th>";
                echo "<th>5時間目</th>";
                echo "<th>放課後</th>";
                echo "</tr>";
            }
            //ルームの開始時
            if($rm['period_id'] == 1){
                echo "<tr>";
                echo "<th>" . $twelve[$room_youso] . "</th>";
            }
            echo "<td>";
            
            //ステータスでボタンか✖を設置
            //in_arrayで要素があると確認した場合はifに進む
            if ($tm_room[$tm_cnt] == $rm['room_id'] && $tm_period[$tm_cnt] == $rm['period_id']){
                echo '<div class="button5">'.$tm_college[$tm_cnt].'</div>';
                $tm_cnt++;
            }
            else if(in_array($rm['status_id'], $button_stats)){
                //青色のボタン
                echo '<form method="get" action="' . $next_url . '">';
                echo '<input type="hidden" name="period" value="' . $rm['period_id'] . '">';
                echo '<input type="hidden" name="date" value=' . $date . '>';
                echo '<button class="button1" name="room" value="' . $rm['room_id'] . '">' . $res_button_values . '</button>';
                echo '<input type="hidden" name="empty" value="0">';
                
                echo '</form>';
            } else{
                //✖ボタン
                echo '<div class="button2">X</div>';
            }

            echo "</td>";

            //ルームの終了時
            if($rm['period_id'] == 6){
                echo "</tr>";
                $room_youso++;
            }

        }
    }
    echo "</table>";
    echo "</div>";
    
    

    ?>

    

    <link rel="stylesheet" href="../Flont/Common/style.css">
</body>

</html>