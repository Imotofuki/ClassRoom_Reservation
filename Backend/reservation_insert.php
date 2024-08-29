<?php

    try{
        session_start();
        $college = $_SESSION['college'];
        $grade = $_SESSION['grade'];
        $name = $_SESSION['name'];
        $period = $_SESSION['period'];
        $room = $_SESSION['room'];
        $date = $_SESSION['date'];
        $count = count($college);

        include("dbConfig.php");

        //先にmember_tableを登録することでmember_idを取得
        //次にmember_idを用いてreservation_tableの登録で仮予約完了

        //member_table

        $strColumn = "count,college_id0,leader_year,leader";
        $strValues = "'" . $count . "','" . $college[0] . "','" . $grade[0] . "','" . $name[0] . "'";

        for ($i = 1; $i < $count; $i++){
            $strColumn = $strColumn . "," . "college_id" . $i . "," . "member" . $i . "_year" . "," . "member" . $i;
            $strValues = $strValues . ",'" . $college[$i] . "','" . $grade[$i] . "','" . $name[$i] . "'"; 
        }

        $insert = $db->query("INSERT INTO member_table (" . $strColumn . ") VALUES (" . $strValues . ")");
        
        // echo gettype($strColumn);
        // echo gettype($strValues);
        // echo ("<br>" . "insert into reservation_table (date_id, period_id, room_id) values ('" . "test" . "','" . "test" ."','" . "test" ."')");
        // echo ("<br>" . "INSERT INTO member_table (" . $strColumn . ") VALUES (" . $strValues . ")");


        //reservation_table
        //まずメンバーIDを入手
        $select = $db->prepare("SELECT MAX(member_id) FROM member_table");
        $select->execute();
        $member_id = $select->fetch();

        //reservation_tableに登録
        // var_dump($member_id[0]);
        //echo "UPDATE reservation_table SET status_id='1',member_id='" . $member_id[0] . "' WHERE date_id='" . $date . "' AND period_id='" . $period . "' AND room_id='" . $room . "'";
        $insert = $db->query("UPDATE reservation_table SET status_id='1',member_id='" . $member_id[0] . "' WHERE date_id='" . $date . "' AND period_id='" . $period . "' AND room_id='" . $room . "'");

        header("Location:../Flont/Reservation/reservation_end.php");

    } catch(Throwable $th){
        echo "エラーが発生しました。もう一度入力してください！";
        session_start();
        $sen = $_SESSION['mode'];
        if (strcmp("student", $sen) == 0){
            header("Location:../Flont/Index/mode_select_student.php");
        } else if (strcmp("teacher", $sen)){
            header("Location:../Flont/Index/mode_select_teacher.php");
        } else{
            header("Location:../Flont/Index/index.php");
        }
        header();
    }



?>