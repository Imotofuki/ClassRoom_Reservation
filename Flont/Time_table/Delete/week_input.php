<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>曜日選択</title>
</head>
<body>
<div class="title">取り消したい講義の<br>曜日を選択してください</div>

<br>

<div class="contents">
    <form action="../../../Backend/room_pick2.php" method="get">
        <div class="day_of_the_week">
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
        
        <div class="foot">
            <button class="Class_blue_button" type="button" onclick='location.href="../../Index/mode_select_teacher.php"'>戻る</button>
            <button class="Class_blue_button" type="submit">送信</button>
        </div>

    </form>
</div>
</body>
</html>