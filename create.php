<?php 

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','root','cosmos');
$mysql->query("INSERT INTO `services` (`name`, `price`) VALUES('$name', '$price')");
$mysql->close();

header('Location: /service.php');
?>