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
        <p>まず、日付を選択してください</p>
        <!-- 日付入力欄を作成 -->
        <input id="Id_date" type="button" autocomplete="off" value="ここをクリック" class="date_button">

        <!-- jQuery本体 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- jQuery UI -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- 日本語化ファイル -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/i18n/jquery.ui.datepicker-ja.min.js"></script>
        <script>
            $(function () {
                $('#Id_date').datepicker({
                    changeMonth: true,
                    duration: 300,
                    showAnim: 'show',
                    showButtonPanel: true

                });
            });
        </script>
    </div>
    <div class="table">
        <table border="1">

            <tr>
                <th>地下・９階</th>
                <th>1時間目</th>
                <th>2時間目</th>
                <th>3時間目</th>
                <th>4時間目</th>
                <th>5時間目</th>
                <th>放課後</th>
            </tr>
            <?php
                $room = [
                    "B 101",
                    "B 104",
                    "B 112",
                    "B 113",
                    "901"
                ];

                for($j = 1; $j <= count($room); $j++){
                    echo("<tr>");
                    echo('<td>');
                    echo($room[$j - 1]);
                    echo('</td>');
                    for ($i = 1; $i <= 6; $i++){
                        echo('<td>');
                        echo('<form action="test">');
                        echo(' <input type="hidden" name="period" value="' . $i . '">
                        <button class="button1" name="room" value="' . $j .'">予約</button>');
                        echo('</form>');
                        echo('</td>');
                    }
                    echo("</tr>");
                }
            ?>
            <tr>
                <th>B 101</th>

                <td>
                    <form action="test">
                        <input type="hidden" name="period" value="1">
                        <button class="button1" name="room" value="1">予約</button>
                    </form>
                </td>
                <td>
                    <form action="test">
                        <input type="hidden" name="period" value="2">
                        <button class="button1" name="room" value="1">予約</button>
                    </form>
                </td>
                <td>
                    <div class="button2">X</div>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>B 104</td>
                <td>
                    <form action="test">
                        <input type="hidden" name="period" value="1">
                        <button class="button1" name="room" value="2">予約</button>
                    </form>
                </td>
                <td>
                    <form action="test">
                        <input type="hidden" name="period" value="2">
                        <button class="button1" name="room" value="2">予約</button>
                    </form>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>B 112</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>B 113</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>901</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>
        <table border="1">
            <tr>
                <th>１０階</th>
                <th>1時間目</th>
                <th>2時間目</th>
                <th>3時間目</th>
                <th>4時間目</th>
                <th>5時間目</th>
                <th>放課後</th>
            </tr>
            <tr>
                <th>1001</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1002</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1003</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1004</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1005</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1006</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1007</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1008</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1009</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1010</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1011</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1012</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1013</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1014</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <th>１１階</th>
                <th>1時間目</th>
                <th>2時間目</th>
                <th>3時間目</th>
                <th>4時間目</th>
                <th>5時間目</th>
                <th>放課後</th>
            </tr>
            <tr>
                <th>1101</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1102</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1103</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1104</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1105</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1106</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1107</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1108</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1109</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1110</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1111</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1112</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1113</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <th>１２階</th>
                <th>1時間目</th>
                <th>2時間目</th>
                <th>3時間目</th>
                <th>4時間目</th>
                <th>5時間目</th>
                <th>放課後</th>
            </tr>
            <tr>
                <th>1201</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1202</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1204</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1206</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>1207</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <link rel="stylesheet" href="style.css">
</body>

</html>