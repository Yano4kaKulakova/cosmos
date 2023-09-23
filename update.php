<?php 

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost','root','root','cosmos');
$mysql->query("UPDATE `services` SET `name` = '$name', `price`='$price' WHERE `services`.`id` = '$id'");
$mysql->close();

header('Location: /service.php');
?>