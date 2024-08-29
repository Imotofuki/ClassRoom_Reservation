<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メンバー入力</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <script type="text/javascript">

        $(function () {

            $('button#add').click(function () {
                var input_table = document.getElementById('member_table');
                var tr_form = '' +
                    '<tr>' +
                    '<td><select name="college[]" id=""><option value="1">パフォーミングアーツ</option><option value="2">マンガ・イラスト</option><option value="3">ゲーム</option><option value="4">e-Sports</option><option value="5">IT</option><option value="6">動画クリエイター</option><option value="7">チャイルドケア</option><option value="8">スポーツ</option><option value="9">ヘアメイク</option><option value="10">デザイン</option><option value="11">ミュージック</option><option value="12">バスケットボール</option><option value="13">フィッシング</option><option value="14">シナリオ</option><option value="15">ビジネス</option></select></td>' +
                    '<td><select name="grade[]" id=""><option value="１年生">１年生</option><option value="２年生">２年生</option><option value="３年生">３年生</option><option value="卒業生">卒業生</option><option value="教師">教師</option></select></td>' +
                    "<td><input type='text' name='name[]'' id='name' class='text'></td>" +
                    '<td><button class="delete" type="button">削除</button></td>' +
                    '</tr>';

                $(tr_form).appendTo($(input_table));
                var audio = document.getElementById('sound2');
                audio.currentTime = 0; // 再生位置を先頭に戻す
                audio.play(); // 音を再生する
            });

            $(document).on('click', 'button.delete', function () {
                $(this).closest('tr').remove();
                var audio = document.getElementById('sound3');
                audio.currentTime = 0; // 再生位置を先頭に戻す
                audio.play(); // 音を再生する
            });

            $('select#num').change(function () {
                const numInput = document.getElementById('num');
                const numValue = numInput.value;
                var input_table = document.getElementById('member_table').querySelector('tbody');


                var tr_form = '' +
                    '<tr>' +
                    '<td><select name="college[]" id=""><option value="1">パフォーミングアーツ</option><option value="2">マンガ・イラスト</option><option value="3">ゲーム</option><option value="4">e-Sports</option><option value="5">IT</option><option value="6">動画クリエイター</option><option value="7">チャイルドケア</option><option value="8">スポーツ</option><option value="9">ヘアメイク</option><option value="10">デザイン</option><option value="11">ミュージック</option><option value="12">バスケットボール</option><option value="13">フィッシング</option><option value="14">シナリオ</option><option value="15">ビジネス</option></select></td>' +
                    '<td><select name="grade[]" id=""><option value="１年生">１年生</option><option value="２年生">２年生</option><option value="３年生">３年生</option><option value="卒業生">卒業生</option><option value="教師">教師</option></select></td>' +
                    "<td><input type='text' name='name[]'' id='name' class='text'></td>" +
                    '<td><button class="delete" type="button">削除</button></td>' +
                    '</tr>';
                $(input_table).empty();


                for (let i = 0; i < numValue; i++) {
                    $(tr_form).appendTo($(input_table));
                }
                var audio = document.getElementById('sound1');
                audio.currentTime = 0; // 再生位置を先頭に戻す
                audio.play(); // 音を再生する
            });




        });
    </script>

    <?php
    
        if ($_GET['empty'] == -1){
            $alert = "<script type='text/javascript'>alert('項目に空の値が入っています。すべて入力してください。');</script>";
            echo $alert;
        }
        if ($_GET['empty'] == -2){
            $alert = "<script type='text/javascript'>alert('メンバーが多すぎます。リーダーを含めて16人以内に収めてください。');</script>";
            echo $alert;
        }

    ?>

    <audio id="sound1" src="決定ボタンを押す33.mp3"></audio>
    <audio id="sound2" src="決定ボタンを押す51.mp3"></audio>
    <audio id="sound3" src="カーソル移動3.mp3"></audio>
    <u>
        <h1 class="title">教室を利用するメンバーの入力</h1>
    </u>
    <form action='../../Backend/input_member.php' method="get">
        <div class="contents">

        <input type="hidden" name="date" value='<?php echo $_GET['date']; ?>'>
        <input type="hidden" name="period" value='<?php echo $_GET['period']; ?>'>
        <input type="hidden" name="room" value='<?php echo $_GET['room']; ?>'>

            <div class="example">
                例）ITカレッジ 2年 氏名 いもと<br>
                <div class="care">
                    ※同じ苗字の方がいる場合は<br>
                    名前の頭文字をつけてください
                </div>
            </div>

            <div class="subtitle1">
                リーダー
            </div>
            <table id="leader_table" border="1">
                <tr>
                    <th>カレッジ</th>
                    <th>学年</th>
                    <th>苗字</th>
                </tr>
                <td>
                    <select name="college[]" id="">
                        <option value="1" >パフォーミングアーツ</option>
                        <option value="2" >マンガ・イラスト</option>
                        <option value="3" >ゲーム</option>
                        <option value="4" >e-Sports</option>
                        <option value="5" >IT</option>
                        <option value="6" >動画クリエイター</option>
                        <option value="7" >チャイルドケア</option>
                        <option value="8" >スポーツ</option>
                        <option value="9" >ヘアメイク</option>
                        <option value="10">デザイン</option>
                        <option value="11">ミュージック</option>
                        <option value="12">バスケットボール</option>
                        <option value="13">フィッシング</option>
                        <option value="14">シナリオ</option>
                        <option value="15">ビジネス</option>
                    </select>
                </td>
                <td>
                    <select name="grade[]" id="">
                        <option value="１年生">１年生</option>
                        <option value="２年生">２年生</option>
                        <option value="３年生">３年生</option>
                        <option value="卒業生">卒業生</option>
                        <option value="教師">教師</option>
                    </select>
                </td>

                <td><input type="text" name="name[]" id="name" class="text"></td>
            </table>

            <div class="line"></div>
            <br>
            <br>

            <div class="member">
                <div class="subtitle2">
                    メンバー(15人まで)
                </div>
                <div class="Class_cnt">
                    人数<select name="num" id="num">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>

            <table id="member_table" border="1">
                <thead>
                    <tr>
                        <th>カレッジ</th>
                        <th>学年</th>
                        <th>苗字</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="college[]" id="">
                                <option value="1">パフォーミングアーツ</option>
                                <option value="2">マンガ・イラスト</option>
                                <option value="3">ゲーム</option>
                                <option value="4">e-Sports</option>
                                <option value="5">IT</option>
                                <option value="6">動画クリエイター</option>
                                <option value="7">チャイルドケア</option>
                                <option value="8">スポーツ</option>
                                <option value="9">ヘアメイク</option>
                                <option value="10">デザイン</option>
                                <option value="11">ミュージック</option>
                                <option value="12">バスケットボール</option>
                                <option value="13">フィッシング</option>
                                <option value="14">シナリオ</option>
                                <option value="15">ビジネス</option>
                            </select>
                        </td>
                        <td>
                            <select name="grade[]" id="">
                                <option value="１年生">１年生</option>
                                <option value="２年生">２年生</option>
                                <option value="３年生">３年生</option>
                                <option value="卒業生">卒業生</option>
                                <option value="教師">教師</option>
                            </select>
                        </td>
                        <td><input type="text" name="name[]" id="name" class="text"></td>
                        <td><button class="delete" type="button">削除</button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td><br><button id="add" type="button" class="Class_blue_button">追加</button></td>
                    </tr>
                </tfoot>
            </table>



        </div>
        <div class="check">メンバーの入力はこれでよろしいですか？</div>
        <div class="foot">

        <?php 
            $date = $_GET['date'];
        ?>

            <button class="Class_blue_button2" onclick='location.href="../../Backend/room_pick.php?date=\"<?php echo $date ; ?>\""'  
                type="button">戻る</button>

            <input class="Class_blue_button2" type="submit" value="はい">

        </div>

    </form>



</body>

</html>