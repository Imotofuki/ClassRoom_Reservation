<?php
    //history_tableの作成用PG

    include('../Backend/dbConfig.php');

    // $date = new Datetime('2024-07-01');
    // $date = new Datetime('2024-09-01');
    // $date = new Datetime('2024-11-01');
    // $date = new Datetime('2025-01-01');
    // $date = new Datetime('2025-01-31');
    // $date = new Datetime('2025-03-31');
    // $date = new Datetime('2025-05-31');
    // $date = new Datetime('2025-07-31');
    // $date = new Datetime('2025-09-31');
    $date = new Datetime('2025-11-31');
    $last = new Datetime('2025-12-31');
    
    for ($i = 0; $date->format('Y-m-d') != $last->format('Y-m-d'); $i++){
        // echo $date->format('Y-m-d');

        // echo $p;
        for ($r = 1; $r <= 37; $r++){
            for ($p = 1; $p <= 6; $p++){
            
                try{
                    $db->query("insert into history_table (date_id, period_id, room_id) values ('" . $date->format('Y-m-d') . "','" . $p ."','" . $r ."')");
                } catch (Throwable $th){
                    echo "errorやで";
                    exit();
                }

            }
        }

        $date->modify('+1 day');
        echo '<br>';
    }
    echo "Success to insert!";

?>