<?php
$host = "127.0.0.1";   // хост
$port = "3308";        // порт
$dbname = "big_practice"; // название БД
$login = "root";       // пользователь
$password = "";        // пароль
$dsn = "mysql:host={$host};port={$port};dbname={$dbname};";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$database = new PDO($dsn, $login, $password, $options);
//$database = new PDO("mysql:host=127.0.0.1;dbname=test;port=3308;", "root","");
?>