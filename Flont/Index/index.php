<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div class="shutter"></div>

    <section class="content">
        <h1 class="Class_top_title">教室の予約システム</h1>
        <div class="Class_top_sub_title">まず、「教師」か「生徒」を選択してください</div>
        <div class="Class_top_button">
            <button onclick="location.href='teacher_code.php';" class="Class_top_and_code_button" type="button">
                教師
            </button>
            <button onclick="location.href='student_code.php';" class="Class_top_and_code_button" type="button">
                生徒
            </button>
        </div>
    </section>

</body>

</html>