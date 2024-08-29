<?php

$mode = $_GET['button'];
        
$url = "date_pick.php";

switch($mode){
    case 1:
        session_start();
        $_SESSION['mode'] = 1;
        break;
    case 2:
        session_start();
        $_SESSION['mode'] = 2;
        break;
    case 3:
        session_start();
        $_SESSION['mode'] = 3;
        $url = "../Flont/Recognition/recognition.php";
        break;
    case 4:
        session_start();
        $_SESSION['mode'] = 4;
        break;
    case 5:
        session_start();
        $_SESSION['mode'] = 5;
        $url = "../Flont/Time_table/Registration/time_table.php";
        break;
    case 6:
        session_start();
        $_SESSION['mode'] = 6;
        $url = "../Flont/Time_table/Delete/week_input.php";
        break;
    default:
        break;
}
                
header('Location:' . $url,true,303);


?>