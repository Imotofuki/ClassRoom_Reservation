<?php

    session_start();
    $code = $_SESSION['code'];

    if (strcmp($code, "student") == 0){
        $homeUrl = "../Flont/Index/mode_select_student.php";
    } else{
        $homeUrl = "../Flont/Index/mode_select_teacher.php";
    }

    $preURL = $_SERVER['HTTP_REFERER']; 

    if (strpos($preURL, "delete_end.php") !== FALSE){
        $_SESSION['mode'] = $_GET['mode'];
    }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <title>日付入力</title>
</head>

<body>
    <form action="" method="get">
        
        <div class="header">
            <p>まず、日付を選択してください</p>
            
            <!-- 日付入力欄を作成 -->
            <input id="Id_date" type="button" autocomplete="off" value="ここをクリック" class="date_button">
            
            <!-- <input type="date" name="tameshi" id="tameshi" class="date_button"> -->
            
            <!-- jQuery本体 -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- jQuery UI -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
            <!-- 日本語化ファイル -->
            <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/i18n/jquery.ui.datepicker-ja.min.js"></script>
            <script>
                // $(document).ready(function() {
                    $("#Id_date").datepicker({
                        dateFormat:'yy-mm-dd',
                        changeMonth: true,
                        duration: 300,
                        showAnim: 'show',
                        showButtonPanel: true,
                        showOtherMonths: true,
                        onSelect: function(dateText, inst) {
                            // 選択された日付に対する処理をここに記述
                            window.location.href = 'room_pick.php?date="' + dateText + '"';
                        }
                    });
                    // });
                    // $(function () {
                        // $('#Id_date').datepicker({
                            // dateFormat:'yy-mm-dd',
                            // dateFormat:'yy-mm-dd',
                            
                            
                            // });
                            // });
                            </script>
            <script>
                
                // $("#Id_date").on("change", function() {
                    // console.log("test");
                    // });
                    
                    </script>
            
        </div>
        
        <!-- <input type="hidden" id="selected_date" name="selected_date"> -->
        
    </form>

    <button class="btn" type="button" onclick='location.href="<?php echo $homeUrl; ?>"'>戻る</button>

    <link rel="stylesheet" href="../Flont/Common/style.css">
</body>

</html>