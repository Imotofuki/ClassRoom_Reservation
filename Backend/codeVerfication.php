<?php 

include('dbConfig.php');

$referer = $_SERVER['HTTP_REFERER'];
//ここでstudent_code.phpまたはteacher_code.phpどちらから値が送られてきたかを判断している

if(strpos($referer,'student_code.php') !== false){
    //inputValueに入力されたIDを入れてる
    $source = 'student';
    $inputValue = $_GET['Def_student_code_input'];
    
    //student_codeとsociety_codeをデータベースからとってきている
    $sql = $db->prepare("SELECT student_code FROM student_code_table WHERE student_code >= 1");
    $sql2 = $db->prepare("SELECT society_code FROM student_code_table WHERE society_code >= 1");
    
    $sql->execute();
    $sql2->execute();
    
    $result = $sql->fetchAll();
    $result2 = $sql2->fetchAll();
    
    foreach($result as $ret){
        //var_dump($ret[0]);
        if($ret[0] == $inputValue){
            session_start();
            $_SESSION['code'] = 'student';
            header('Location:../Flont/index/mode_select_student.php',true,303);
            exit();
        }
    }
    foreach($result2 as $ret){
        //var_dump($ret[0]);
        if($ret[0] == $inputValue){
            session_start();
            $_SESSION['code'] = 'student';
            header('Location:../Flont/index/mode_select_student.php',true,303);
            exit();
        }
    }
    header('Location:../Flont/index/student_code.php',true,303);
}
else{
    $source = 'teacher';
    $inputValue2 = $_GET['Def_teacher_code_input'];
    
    $sql3 = $db->prepare("SELECT teacher_code FROM teacher_code_table WHERE teacher_code >= 1");
    $sql3->execute();
    $teachers = $sql3->fetchAll();
    
    $data = $_GET['data'];

    echo $data;

    if ($data == 1){
        $nextUrl = "Location:../Flont/Recognition/recognition.php";
        $elseUrl = "Location:../Flont/index/teacher_code.php?data=1";
    } else{
        $nextUrl = "Location:../Flont/index/mode_select_teacher.php";
        $elseUrl = "Location:../Flont/index/teacher_code.php?data=0";        
    }

    echo $nextUrl;
    

    
    foreach($teachers as $ret2){
        //var_dump($ret2[0]);
        if($ret2[0] == $inputValue2){
            session_start();
            $_SESSION['code'] = 'teacher';
            
            header($nextUrl);
            exit();
        }
    }
    header($elseUrl);
    
}
