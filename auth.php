<?php 

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','root','cosmos');
$result = $mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `pass`='$pass'");
$user = $result->fetch_assoc();
if(count($user)==0) {
    echo "Пользователь не найден!";
    exit();
}
setcookie('user', $user['name'], time()+3600, "/login.php");

$mysql->close();

header('Location: /login.php');
?>