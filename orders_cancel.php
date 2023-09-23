<?php 

$id = $_GET['id'];

$mysql = new mysqli('localhost','root','root','cosmos');
$mysql->query("UPDATE `orders` SET `visit` = '-' WHERE `orders`.`id` = '$id'");
$mysql->close();

header('Location: /orders.php');
?>