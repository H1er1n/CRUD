<?php
include 'db.php';

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$get_id = $_GET['id'] ?? null;
$message = '' ?? null;



// create
if (isset($_POST['add'])) {
    $sql = ("INSERT INTO usernames (username, password) VALUES (?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$username, $password]);
    if ($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//read
$sql = $pdo->prepare("SELECT id, username, password FROM usernames");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);


//update
if (isset($_POST['edit'])) {
    $sql = ("UPDATE usernames SET username=?, password=? WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$username, $password, $get_id]);
    if ($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//delte
if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM usernames WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query){
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }
}

//register
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registr'])) {
    $newUsername = $_POST['inputname'] ?? null;
    $newPassword = $_POST['inputpassword'] ?? null;
    $re_inputpassword = $_POST['re_inputpassword'] ?? null;
   
        $sql = ("INSERT INTO usernames (username, password) VALUES (?,?)");
        $query = $pdo->prepare($sql);
        $query->execute([$newUsername, $newPassword]);
        if ($query){
            header("Location: menu.php");
        }
    }
   

//authtorisation

        
        
        
    


?>