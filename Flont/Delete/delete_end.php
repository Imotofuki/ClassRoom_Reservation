<?php

    session_start();
    $code = $_SESSION['code'];

    if (strcmp($code, "student") == 0){
        $homeUrl    = "../Index/mode_select_student.php";
        $recogUrl   = "../Index/teacher_code.php?data=1";
    } else{
        $homeUrl    = "../Index/mode_select_teacher.php";
        $recogUrl   = "../Recognition/recognition.php";
    }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除完了画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="title">
        <h1>予約を削除しました</h1>
    </div>
    <div class="foot">
        <button class="Class_blue_button2" onclick='location.href="../../Backend/date_pick.php?mode=1"'>予約する</button>
        <button class="Class_blue_button2" onclick='location.href="<?php echo $recogUrl; ?>"'>予約を承認</button>
        <button class="Class_blue_button2" onclick='location.href="<?php echo $homeUrl; ?>"'>ホームへ</button>
    </div>
</body>

</html>