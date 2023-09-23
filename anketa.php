<?php
if (isset($_POST['phone']) && isset($_POST['sex']) && isset($_POST['age']) && isset($_POST['freq']) && isset($_POST['visit']) && isset($_POST['crit']) && isset($_POST['rate']) && isset($_POST['improve']))
{
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $freq = $_POST['freq'];
    $visit = $_POST['visit'];
    $crit = $_POST['crit'];
    $rate = $_POST['rate'];
    $improve = $_POST['improve'];

    $db_host = "localhost"; 
    $db_user = "root";
    $db_password = "root";
    $db_base = 'cosmos';
    $db_table = "anketa";
    
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

	if ($mysqli->connect_error) 
	    {die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error); }
  
$result = $mysqli->query("INSERT INTO ".$db_table." (id_otv,phone,sex,age,freq,visit,crit,rate,improve) VALUES('','$phone','$sex','$age','$freq','$visit','$crit','$rate','$improve')");
    if ($result == true){ echo "Поздравляем с успешным прохожднием анкетирования! Для получения вознаграждения необходимо обратиться к администратору батутного центра!";}
    else {echo "Произошла ошибка";}
}
?>