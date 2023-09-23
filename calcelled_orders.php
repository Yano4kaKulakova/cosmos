<!DOCTYPE html>
<html land="ru">
<title>Заявки на посещение</title>
<style type="text/css"> 
    h1 {
        padding-top: 110px;
        padding-left: 30px;
        font-family: 'Montserrat', sans-serif; 
        font-size: 18px;
        color:black;
        }
    table {
        margin-left: 30px;
        font-family: 'Montserrat', sans-serif; 
        font-size: 14px;
        color:black;
        background-color: yellow;
        width: 95%;
        border: 3px solid purple;
        border-collapse: collapse;
        }
    td, th {
        border: 3px solid purple;
    }
    form {
        padding-left: 30px;
    }
    input {
        border: 3px solid purple;
        font-size: 18px;
    }
    button {
    display: inline-block;
    vertical-align: top;
    padding: 5px 5px;
    border: 3px solid purple;
    color: purple;
    text-transform: uppercase;
    font-size: 12px;
    transition: background .1s linear, color .1s linear;
}

    button:hover {
    background-color: purple;
    color: white;
}
    a {
        text-decoration: none;
    }
    p {
        font-family: 'Montserrat', sans-serif; 
        font-size: 18px;
        color:black;
        }
</style>
<head>
  <meta charset="UTF-8">
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">  
</head>
    
<body>
<header class="header">
     <div class="container">
         <div class="header__inner">
         <a class="header__logo" href="index.php"><img src="assets/images/logo.jpg" ></a>
             <info class="info"><a>Смоленск, Октябрьской Революции, 9к4<br/>+7 (952) 531-96-56</a></info>
             <nav class="nav">    
             <a class="nav__link" href="index.php">ГЛАВНАЯ</a>
             <a class="nav__link" href="login.php">ЛИЧНЫЙ КАБИНЕТ</a>
             <a class="nav__link" href="index.php#stock">АКЦИИ</a>   
             <a class="nav__link" href="index.php#contacts">КОНТАКТЫ</a> 
             </nav>
         </div>
     </div>
</header>
    <div class="service__container">
<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'cosmos');
    if (!$link) {
      echo 'Отсутствует соединение с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
  ?>
<h1></h1>        
<form action="excel.php" method="post">
<button type="submit" name="export_excel"><img src="assets/images/excel.png"></button><a> </a><button onclick="javascript:window.print()"><img src="assets/images/print.png"></button>   
</form>
<form action="<?= $_SERVER['SCRIPT_NAME'] ?>">
    <p>Невыполненные заявки за период предполагаемого посещения с <input type="datetime-local" name="start" size="51">
    по <input type="datetime-local" name="end" size="51">
    <button type="submit">Поиск</button><br>
    </p> 
</form>
        
<table>
  <tr>
    <th>№</th>
    <th>Дата и время подачи заявки</th>
    <th>ФИО посетителя</th>
    <th>Номер телефона</th>
    <th>Дата и время посещения</th>
    <th>Выбранная услуга</th>  
  </tr>
  <?php
    $inputStart = $_REQUEST['start'];
    $inputEnd = $_REQUEST['end'];  
      if($inputStart == '' && $inputEnd == ''):
    $sql = mysqli_query($link, "SELECT * FROM `orders` WHERE `visit` = '-'");
    while ($result = mysqli_fetch_array($sql)) {
      echo '<tr>'.
          "<td>{$result['id']}</td>".
          "<td>{$result['date_o']}</td>".
          "<td>{$result['name']}</td>".
          "<td>{$result['phone']}</td>".
          "<td>{$result['date_v']}</td>".
          "<td>{$result['service']}</td>".
          '</tr>';
    }
    else:
    $sql = mysqli_query($link, "SELECT * FROM `orders` WHERE `visit` = '-' && `orders`.`date_v` >= '$inputStart' && `orders`.`date_v` <= '$inputEnd'");
    while ($result = mysqli_fetch_array($sql)) {
      echo '<tr>'.
          "<td>{$result['id']}</td>".
          "<td>{$result['date_o']}</td>".
          "<td>{$result['name']}</td>".
          "<td>{$result['phone']}</td>".
          "<td>{$result['date_v']}</td>".
          "<td>{$result['service']}</td>".
          '</tr>';
    }
      endif;    
  ?>
    
</table>
    </div>
</body>
</html>
