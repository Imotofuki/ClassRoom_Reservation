<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="get">

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
                    2014年7月24日<br>
                    1002教室<br>
                    2時間目
                </div>
            </u>
        </div>

        <div class="subtitle">
            こちらの内容で予約します。<br>
            よろしいですか？
        </div>
        <div class="foot">
            <button class="Class_blue_button2" type="button"
                onclick="location.href='reservation_input_member.php'">いいえ</button>
            <button class="Class_blue_button2" type="submit">はい</button>
        </div>
    </form>

</body>

</html>