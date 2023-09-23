<?php 

$id = $_GET['id'];

$mysql = new mysqli('localhost','root','root','cosmos');
$mysql->query("INSERT INTO `visits` (`date`,`name`, `service`,`price`) SELECT `orders`.`date_v`, `orders`.`name`, `orders`.`service`, `services`.`price` FROM `orders`LEFT JOIN `services`ON `orders`.`service`=`services`.`name` WHERE `orders`.`id` = '$id'");
$mysql->query("UPDATE `orders` SET `visit` = '+' WHERE `orders`.`id` = '$id'");
$mysql->close();

header('Location: /orders.php');
?>