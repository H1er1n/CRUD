<?php
$host = 'localhost';
$dbname = 'users';
$dbusername = 'root';
$pass = null;

try {
    // Создание подключения
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $pass);
} catch (PDOException $e){
    echo 'Ошибка соединения с БД'.$e-> getMessage();
}
    ?>