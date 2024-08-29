<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>講義登録画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title">講義登録</div>

    <div class="contents">
        <form action="../../../Backend/room_pick2.php" method="get">
            <div class="day_of_the_week">
                曜日：
                <select name="day_of_the_week" id="">
                    <option value="1">月曜日</option>
                    <option value="2">火曜日</option>
                    <option value="3">水曜日</option>
                    <option value="4">木曜日</option>
                    <option value="5">金曜日</option>
                    <option value="6">土曜日</option>
                    <option value="0">日曜日</option>
                </select>
            </div>
            <br><br>
            <div class="college">

                カレッジ：
                <select name="college_name" id="">
                    <option value="パフォーミングアーツ">パフォーミングアーツ</option>
                    <option value="マンガ・イラスト">マンガ・イラスト</option>
                    <option value="ゲーム">ゲーム</option>
                    <option value="e-Sports">e-Sports</option>
                    <option value="IT">IT</option>
                    <option value="動画クリエイター">動画クリエイター</option>
                    <option value="チャイルドケア">チャイルドケア</option>
                    <option value="スポーツ">スポーツ</option>
                    <option value="ヘアメイク">ヘアメイク</option>
                    <option value="デザイン">デザイン</option>
                    <option value="ミュージック">ミュージック</option>
                    <option value="バスケットボール">バスケットボール</option>
                    <option value="フィッシング">フィッシング</option>
                    <option value="シナリオ">シナリオ</option>
                    <option value="ビジネス">ビジネス</option>
                </select>
            </div>
            <div class="foot">
                    <button class="Class_blue_button" type="button" onclick='location.href="../../Index/mode_select_teacher.php"'>戻る</button>
                    <button class="Class_blue_button" type="submit">送信</button>
            </div>

        </form>
    </div>
    
</body>
</html>