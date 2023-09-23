<?php 

$service = filter_var(trim($_POST['service']), FILTER_SANITIZE_STRING);
$date_v = filter_var(trim($_POST['date_v']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','root','cosmos');
$mysql->query("INSERT INTO `orders` (`service`,`date_v`,`name`, `phone`) VALUES('$service','$date_v','$name', '$phone')");
$mysql->close();

header('Location: /login.php');
?>