<?php 

$id = $_GET['id'];

$mysql = new mysqli('localhost','root','root','cosmos');
$mysql->query("DELETE FROM `visits` WHERE `visits`.`id` = '$id'");
$mysql->close();

header('Location: /visits.php');
?>