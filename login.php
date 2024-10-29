<?php
session_start();
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['inputname'] ?? null; 
    $password = $_POST['inputpassword'] ?? null;
    $stmt = $pdo->prepare("SELECT username, password FROM usernames WHERE username =? AND password =?");
    echo $username . '<br>';
    echo $password . '<br>';
   echo $stmt->execute([$username, $password]);
   
   // Получение результата
  $result = $stmt->fetchAll();
   if ($result) {
       // Если пользователь найден, устанавливаем сессию
   $_SESSION['logged_in'] = true;
 $_SESSION['user_id'] = $result[0]['id'];
       header('Location: menu.php');
   } else {
       echo "Неверный логин или пароль.";
}
} else {
   echo "Пожалуйста, заполните все поля.";
}
?>

