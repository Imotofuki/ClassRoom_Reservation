<?php

$dbName = 'mysql:host = localhost;dbname=teama;charset=utf8';
$userName = 'root';

try {
    $db = new PDO($dbName,$userName);
    // var_dump('DBと接続できてるで^^');
} catch(\Throwable $th){
    exit();
}