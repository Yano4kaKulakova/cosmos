<?php 

$id = $_GET['id'];

$mysql = new mysqli('localhost','root','root','cosmos');
$mysql->query("DELETE FROM `services` WHERE `services`.`id` = '$id'");
$mysql->close();

header('Location: /service.php');
?>