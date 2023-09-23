<?php 

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
$date = filter_var(trim($_POST['date']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

if(mb_strlen($login)<3||mb_strlen($login)>50) {
    echo "Недопустимое количество символов";
    exit();
} else if(mb_strlen($pass)<3||mb_strlen($pass)>50) {
    echo "Недопустимое количество символов";
    exit();
}

$mysql = new mysqli('localhost','root','root','cosmos');
$mysql->query("INSERT INTO `users` (`name`, `phone`, `date`,`login`, `pass`) VALUES('$name', '$phone', '$date','$login', '$pass')");
$mysql->close();

header('Location: /login.php');
?>