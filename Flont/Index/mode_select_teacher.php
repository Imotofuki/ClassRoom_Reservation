<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>モード選択</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <h1 class="Class_home_title">ホーム画面</h1>
    <div class="Class_button">
        <div class="Class_home_button">
            <button onclick="location.href='../../Backend/mode_session.php?button=1'" class="Class_blue_button">
                <h3>予約する</h3>
            </button>
            <button onclick="location.href='../../Backend/mode_session.php?button=5'" class="Class_blue_button">
                <h3>講義登録</h3>
            </button>
            <button onclick="location.href='../../Backend/mode_session.php?button=4'" class="Class_blue_button">
                <h3>履歴確認</h3>
            </button>
        </div>
        <div class="Class_home_button">
            <button onclick="location.href='../../Backend/mode_session.php?button=2'" class="Class_blue_button">
                <h3>予約取消</h3>
            </button>
            <button onclick="location.href='../../Backend/mode_session.php?button=6'" class="Class_blue_button">
                <h3>講義取消</h3>
            </button>
            <button onclick="location.href='../../Backend/mode_session.php?button=3'" class="Class_blue_button">
                <h3>予約承認</h3>
            </button>
        </div>
    </div>

    <div class="Class_top_button">
        <button onclick="location.href='../index/index.php'" class="Class_blue_button">
            <h3>トップページへ</h3>
        </button>
    </div>
</body>

</html>