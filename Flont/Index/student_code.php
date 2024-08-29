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
                 if(strpos($returnUrl,'student_code.php') !== false)
                 echo("※入力された「学籍番号」または「社会人コード」は<br>
                 見つかりませんでした。");
                 ?>
            </div>
            <p><?php if(strpos($returnUrl,'student_code.php') !== false)
            echo("もう一度");
            ?>「学籍番号」または「社会人コード」を<br>入力してください</p>
        </div>
        <form action="../../Backend/codeVerfication.php" method="get" class="Class_code_form">
            <input type="text" name="Def_student_code_input" class="Class_code_input" autocomplete="off" >
            <div class="Class_top_button">
                <!-- type="button"を指定しないとsubmitボタンだと認識される -->
                <button type="button" onclick="location.href='index.php'" class="Class_top_and_code_button">
                    戻る
                </button>
                <button type="submit" class="Class_top_and_code_button">
                    送信
                </button>
            </div>
            <!-- コードがあればここに飛んでください -->
        </form>


    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!--自作のJS-->
    <script src="4-2-9.js"></script>

</body>

</html>