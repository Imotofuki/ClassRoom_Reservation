<?php
    session_start();
    $code = $_SESSION['code'];

    if (strcmp($code, "student") == 0){
        $homeUrl = "../Index/mode_select_student.php";
        $recogUrl   = "../Index/teacher_code.php";
    } else{
        $homeUrl = "../Index/mode_select_teacher.php";
        $recogUrl   = "../Recognition/recognition.php";
    }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仮予約完了画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 class="title2">仮予約が完了しました</h1>

    <div class="end_contents">
        <u>教師が仮予約を承認すると</u>予約完了となります。<br>
        近くの教師に承認を促し、除菌用具を借りてください。
    </div>

    <div class="foot">
        <button class="Class_blue_button3" onclick='location.href="../Delete/delete_check.php"'>今の予約の<br>取り消し</button>
        <button class="Class_blue_button2" onclick='location.href="<?php echo $recogUrl; ?>"'>予約を承認</button>
        <button class="Class_blue_button2" onclick='location.href="<?php echo $homeUrl; ?>"'>ホームへ</button>
    </div>
</body>

</html>