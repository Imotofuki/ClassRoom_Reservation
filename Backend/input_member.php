<?php

    $college = $_GET['college'];
    $grade   = $_GET['grade'];
    $name    = $_GET['name'];
    $period  = $_GET['period'];
    $room    = $_GET['room'];
    $date    = $_GET['date'];

    $count   = count($college);

    // var_dump($college);
    // echo "<br>";
    // var_dump($grade);
    // echo "<br>";
    // var_dump($name);
    // echo "<br>";

    session_start();
    $_SESSION['college']   =   $college   ;
    $_SESSION['grade']     =   $grade     ;
    $_SESSION['name']      =   $name      ;
    $_SESSION['period']    =   $period    ;
    $_SESSION['room']      =   $room      ;
    $_SESSION['date']      =   $date      ;

    //エラー処理
    if ($count > 16){
        header('Location:../Flont/Reservation/reservation_input_member.php?date=' . $date . '&period=' . $period . '&room=' . $room . '&empty=-2');
    }
    

    for ($i = 0; $i < $count; $i++){
        if (empty($name[$i])){
            header('Location:../Flont/Reservation/reservation_input_member.php?date=' . $date . '&period=' . $period . '&room=' . $room . '&empty=-1');
        }
    }

    include ('dbConfig.php');

    $sql = $db->prepare("SELECT room_name FROM room_table WHERE room_id = " . $room);
    $sql->execute();
    $room_name = $sql->fetchAll();

    // var_dump($room_name);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="../Flont/Reservation/style2.css">
</head>

<body>
    <form action="reservation_insert.php" method="get">

        <div class="title">予約に関する確認事項</div>


        <div class="check">
            <div class="check_contents">
                <ul>
                    <li>延長して教室を利用したい場合は次の時間の予約も行う事。</li>

                    <li>移動させた「机, 椅子」等は元の位置に戻しておく事。</li>

                    <li>
                        教師から「除菌スプレー, 除菌用ペーパー」を預かり、<br>
                        使用後はきちんと返す事。
                    </li>
                </ul>
            </div>
            <div class="under"><input type="checkbox" name="" id="" class="checkbox" required>すべての項目にチェック</div>
        </div>

        <div class="reservation">
            <div class="title">予約確認</div>
            <u>
                <div class="reservation_contents">
                    <?php echo $date; ?><br>
                    <?php echo $room_name[0][0]; ?>教室<br>
                    <?php
                    if ($period < 6){
                        echo $period . "時間目";
                    } else{
                        echo("放課後");
                    } 
                    ?>
                </div>
            </u>
        </div>

        <div class="subtitle">
            こちらの内容で予約します。<br>
            よろしいですか？
        </div>
        <div class="foot">
            <button class="Class_blue_button2" type="button"
                onclick='location.href="../Flont/Reservation/reservation_input_member.php<?php echo("?date=" . $date . "&period=" . $period . "&room=" . $room . "&empty=0"); ?>"'>いいえ</button>
            <button class="Class_blue_button2" type="submit" name="my_button">はい</button>
        </div>
    </form>

</body>

</html>

