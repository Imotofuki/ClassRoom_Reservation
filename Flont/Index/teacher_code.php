<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コード入力画面</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="4-2-9.css">
</head>

<body>
    <div id="splash">
        <div id="splash-logo">Loading ...</div>
        <!--/splash-->
    </div>
    <div class="splashbg"></div>
    <!---画面遷移用-->
    <div id="container">

        <div class="splashbg"></div><!---画面遷移用-->
        <div class="Class_code_sub_title">
            <div class="Class_code_not_found">
            <?php
            $returnUrl = $_SERVER['HTTP_REFERER'];
            if(strpos($returnUrl,'teacher_code.php') !== false)
            echo("※入力された教師用コードは<br>
            見つかりませんでした。");
            ?>
            </div>
            <p><?php if(strpos($returnUrl,'teacher_code.php') !== false)
            echo("もう一度");
            ?>「教師用コード」を入力してください</p>
            
        </div>

        <?php

// || (strpos($returnUrl,'teacher_code.php') !== false)

        $returnUrl = $_SERVER['HTTP_REFERER'];

        if (strpos($returnUrl, 'teacher_code.php') !== false){
            if ($_GET['data'] == 0){
                $nextUrl = "../../Backend/codeVerfication.php?data=0";
                $echo = '<input type="hidden" name="data" value="0">';
            } else{
                $nextUrl = "../../Backend/codeVerfication.php?data=1";
                $echo = '<input type="hidden" name="data" value="1">';    
            }
        } else if((strpos($returnUrl,'reservation_end.php') !== false) || (strpos($returnUrl,'delete_end.php') !== false)){
            $nextUrl = "../../Backend/codeVerfication.php?data=1";
            $echo = '<input type="hidden" name="data" value="1">';
        } else{
            $nextUrl = "../../Backend/codeVerfication.php?data=0";
            $echo = '<input type="hidden" name="data" value="0">';
        }

        ?>

        <form action="<?php echo $nextUrl; ?>" method="get" class="Class_code_form">

            <input type="text" name="Def_teacher_code_input" class="Class_code_input" autocomplete="off" >
            <?php echo $echo; ?>

            <div class="Class_top_button">
                <!-- type="button"を指定しないとsubmitボタンだと認識される -->
                <button type="button" onclick="location.href='index.php'" class="Class_top_and_code_button">
                    戻る
                </button>

                <button type=" submit" class="Class_top_and_code_button">
                    送信
                </button>
            </div>

            <!-- コードがあればここに飛んでください -->
          

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--自作のJS-->
    <script src="4-2-9.js"></script>

    </form>
</body>

</html>