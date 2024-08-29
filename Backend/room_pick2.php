<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教室選択</title>
</head>
<body>
    
</body>
</html>

<?php

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

$week = [
    "日曜日",
    "月曜日",
    "火曜日",
    "水曜日",
    "木曜日",
    "金曜日",
    "土曜日",
];

include('dbConfig.php');

session_start();
$mode = $_SESSION['mode'];


if ($mode == 5){
    $week_num           = $_GET['day_of_the_week'];
    $get_college_name   = $_GET['college_name'];
} else{
    $week_num           = $_GET['day_of_the_week'];
    // $get_college_name   = "";
}

$sql2 = $db->prepare("SELECT period_id, room_id, status_id, college_name FROM time_table_table WHERE day_of_the_week = " . $week_num . " ORDER BY room_id ASC, period_id ASC");
$sql2->execute();
$room_data = $sql2->fetchAll();

$room = [];
$period = [];
$status = [];
$college_name = [];

foreach($room_data as $rd){
    $period[]       = $rd[0];
    $room[]         = $rd[1];
    $status[]       = $rd[2];
    $college_name[] = $rd[3];
}

$period[] = -1;
$room[] = -1;
$status[] = -1;
$college_name[] = "-1";
$tm_cnt = 0;

// var_dump($period);
// echo ("<br>");
// var_dump($room);
// echo ("<br>");
// var_dump($status);
// echo ("<br>");
// var_dump($college_name);



if ($mode == 5){
    $res_button_values = "講義登録";
    $button_stats = 0;
    $next_url = "time_table_insert.php";
    $prev_url = "../Flont/Time_table/Registration/time_table.php";
} else{
    $res_button_values = "講義取消";
    $button_stats = 1;
    $next_url = "../Flont/Time_table/Delete/delete_check.php";
    $prev_url = "../Flont/Time_table/Delete/week_input.php";
}



echo('<link rel="stylesheet" href="../Flont/Common/style.css">');

echo ('<div class="header">
        <button onclick="location.href=\'' . $prev_url . '\'" class="btn">戻る</button>

    </div>');
    
    //入っている講義しかデータが入っていないため、別のPGで空の時にOKボタンを表示するようにする
    //カレッジ・曜日->room_pick2.phpで部屋選択->登録処理->終了画面


$room_youso = 0;
$table_cnt = 0;
$college_cnt = 0;



echo "<div class='title'>【" . $week[$week_num] . "】</div>";

echo "<div class='table'>";

for($r = 1; $r <= 37; $r++){
    for($p = 1; $p <= 6; $p++){
        if ($r <= 5){
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
            if($p == 1){
                echo "<tr>";
                echo "<th>" . $nine[$room_youso] . "</th>";
            }
            echo "<td>";

            //ステータスでボタンか✖を設置
            //in_arrayで要素があると確認した場合はifに進む
            if((!($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 0){
                // echo ($period[$tm_cnt]);
                // echo ($room[$tm_cnt]);
                //青色のボタン

                echo '<form method="get" action="' . $next_url . '">';
                echo '<button class="button1" name="room" value="' . $r . '">' . $res_button_values . '</button>';
                echo '<input type="hidden"    name="day_of_the_week"   value="' . $week_num . '">';
                echo '<input type="hidden"    name="college_name"      value="' . $get_college_name . '">';
                echo '<input type="hidden"    name="period" value="' . $p . '">';
                echo '<input type="hidden"    name="empty" value="0">';

                echo '</form>';
                
                
            } else if((($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 0){
                // echo ($period[$tm_cnt]);
                // echo ($room[$tm_cnt]);
                //青色のボタン

                // echo($period[$tm_cnt]);
                
                if (count($period) - 1 !== $tm_cnt) $tm_cnt++;

                echo '<div class="button2">X</div>';
                
                
            }else if((($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 1){
                $tm_cnt++;
                $get_college_name = $college_name[$college_cnt];
                // var_dump($college_name);
                $college_cnt++;
                //青色のボタン
                echo '<form method="get" action="' . $next_url . '">';
                echo '<button class="button4" name="room" value="' . $r . '">' . $get_college_name . '</button>';
                echo '<input type="hidden" name="day_of_the_week"   value="' . $week_num . '">';
                echo '<input type="hidden" name="college_name"      value="' . $get_college_name . '">';
                echo '<input type="hidden" name="period" value="' . $p . '">';
                echo '<input type="hidden" name="empty" value="0">';

                echo '</form>';
            } else{
                //✖ボタン
                echo '<div class="button2">X</div>';
            }

            echo "</td>";

            //ルームの終了時
            if($p == 6){
                echo "</tr>";
                $room_youso++;
            }

        }
        else if ($r <= 19){
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
            if($p == 1){
                echo "<tr>";
                echo "<th>" . $ten[$room_youso] . "</th>";
            }
            echo "<td>";

            //ステータスでボタンか✖を設置
            //in_arrayで要素があると確認した場合はifに進む
            if((!($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 0){
                // echo ($period[$tm_cnt]);
                // echo ($room[$tm_cnt]);
                //青色のボタン

                

                echo '<form method="get" action="' . $next_url . '">';
                echo '<button class="button1" name="room" value="' . $r . '">' . $res_button_values . '</button>';
                echo '<input type="hidden"    name="day_of_the_week"   value="' . $week_num . '">';
                echo '<input type="hidden"    name="college_name"      value="' . $get_college_name . '">';
                echo '<input type="hidden"    name="period" value="' . $p . '">';
                echo '<input type="hidden"    name="empty" value="0">';

                echo '</form>';
                
                
            } else if((($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 0){
                // echo ($period[$tm_cnt]);
                // echo ($room[$tm_cnt]);
                //青色のボタン

               
                
                if (count($period) - 1 !== $tm_cnt) $tm_cnt++;

                echo '<div class="button2">X</div>';
                
                
            } else if((($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 1){
                $tm_cnt++;
                $get_college_name = $college_name[$college_cnt];
                // var_dump($college_name);
                $college_cnt++;
                //青色のボタン
                echo '<form method="get" action="' . $next_url . '">';
                echo '<button class="button4" name="room" value="' . $r . '">' . $get_college_name . '</button>';
                echo '<input type="hidden" name="day_of_the_week"   value="' . $week_num . '">';
                echo '<input type="hidden" name="college_name"      value="' . $get_college_name . '">';
                echo '<input type="hidden" name="period" value="' . $p . '">';
                echo '<input type="hidden" name="empty" value="0">';

                echo '</form>';
            }  else{
                //✖ボタン
                echo '<div class="button2">X</div>';
            }

            echo "</td>";

            //ルームの終了時
            if($p == 6){
                echo "</tr>";
                $room_youso++;
            }

        }
        else if ($r <= 32){
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
            if($p == 1){
                echo "<tr>";
                echo "<th>" . $eleven[$room_youso] . "</th>";
            }
            echo "<td>";

            //ステータスでボタンか✖を設置
            //in_arrayで要素があると確認した場合はifに進む
            if((!($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 0){
                // echo ($period[$tm_cnt]);
                // echo ($room[$tm_cnt]);
                //青色のボタン

                

                echo '<form method="get" action="' . $next_url . '">';
                echo '<button class="button1" name="room" value="' . $r . '">' . $res_button_values . '</button>';
                echo '<input type="hidden"    name="day_of_the_week"   value="' . $week_num . '">';
                echo '<input type="hidden"    name="college_name"      value="' . $get_college_name . '">';
                echo '<input type="hidden"    name="period" value="' . $p . '">';
                echo '<input type="hidden"    name="empty" value="0">';

                echo '</form>';
                
                
            } else if((($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 0){
                // echo ($period[$tm_cnt]);
                // echo ($room[$tm_cnt]);
                //青色のボタン

               
                
                if (count($period) - 1 !== $tm_cnt) $tm_cnt++;

                echo '<div class="button2">X</div>';
                
                
            } else if((($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 1){
                $tm_cnt++;
                $get_college_name = $college_name[$college_cnt];
                // var_dump($college_name);
                $college_cnt++;
                //青色のボタン
                echo '<form method="get" action="' . $next_url . '">';
                echo '<button class="button4" name="room" value="' . $r . '">' . $get_college_name . '</button>';
                echo '<input type="hidden" name="day_of_the_week"   value="' . $week_num . '">';
                echo '<input type="hidden" name="college_name"      value="' . $get_college_name . '">';
                echo '<input type="hidden" name="period" value="' . $p . '">';
                echo '<input type="hidden" name="empty" value="0">';

                echo '</form>';
            } else{
                //✖ボタン
                echo '<div class="button2">X</div>';
            }

            echo "</td>";

            //ルームの終了時
            if($p == 6){
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
            if($p == 1){
                echo "<tr>";
                echo "<th>" . $twelve[$room_youso] . "</th>";
            }
            echo "<td>";

            //ステータスでボタンか✖を設置
            //in_arrayで要素があると確認した場合はifに進む
            if((!($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 0){
                // echo ($period[$tm_cnt]);
                // echo ($room[$tm_cnt]);
                //青色のボタン

                

                echo '<form method="get" action="' . $next_url . '">';
                echo '<button class="button1" name="room" value="' . $r . '">' . $res_button_values . '</button>';
                echo '<input type="hidden"    name="day_of_the_week"   value="' . $week_num . '">';
                echo '<input type="hidden"    name="college_name"      value="' . $get_college_name . '">';
                echo '<input type="hidden"    name="period" value="' . $p . '">';
                echo '<input type="hidden"    name="empty" value="0">';

                echo '</form>';
                
                
            } else if((($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 0){
                // echo ($period[$tm_cnt]);
                // echo ($room[$tm_cnt]);
                //青色のボタン

               
                
                if (count($period) - 1 !== $tm_cnt) $tm_cnt++;

                echo '<div class="button2">X</div>';
                
                
            } else if((($p == $period[$tm_cnt] && $r == $room[$tm_cnt])) && $button_stats == 1){
                $tm_cnt++;
                $get_college_name = $college_name[$college_cnt];
                // var_dump($college_name);
                $college_cnt++;
                //青色のボタン
                echo '<form method="get" action="' . $next_url . '">';
                echo '<button class="button4" name="room" value="' . $r . '">' . $get_college_name . '</button>';
                echo '<input type="hidden" name="day_of_the_week"   value="' . $week_num . '">';
                echo '<input type="hidden" name="college_name"      value="' . $get_college_name . '">';
                echo '<input type="hidden" name="period" value="' . $p . '">';
                echo '<input type="hidden" name="empty" value="0">';

                echo '</form>';
            } else{
                //✖ボタン
                echo '<div class="button2">X</div>';
            }

            echo "</td>";

            //ルームの終了時
            if($p == 6){
                echo "</tr>";
                $room_youso++;
            }
        }
    }
}

?>