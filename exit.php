<?php 
setcookie('user', $user['name'], time()-3600, "/login.php");
header('Location: /login.php');
?>