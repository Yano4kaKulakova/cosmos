<!DOCTYPE html>
<html land="ru">
<title>Услуги</title>
<style type="text/css"> 
    h1 {
        padding-top: 90px;
        }
    table {
        margin-left: 40px;
        font-family: 'Montserrat', sans-serif; 
        font-size: 18px;
        color:black;
        background-color: yellow;
        width: 70%;
        border: 3px solid purple;
        border-collapse: collapse;
        }
    td, th {
        border: 3px solid purple;
    }
    form {
        padding-top: 10px;
        padding-left: 40px;
    }
    input {
        border: 3px solid purple;
        font-size: 18px;
    }
    button {
    display: inline-block;
    vertical-align: top;
    padding: 4.5px 45px;
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
<table>
  <tr>
    <th>Наименование услуги</th>
    <th>Стоимость <a href="service_asc.php">↑</a><a href="service_desc.php">↓</a></th>
  </tr>
  <?php
    $sql = mysqli_query($link, 'SELECT * FROM `services` ORDER BY `price`');
    while ($result = mysqli_fetch_array($sql)) {
      echo '<tr>'.
          "<td>{$result['name']}</td>".
          "<td>{$result['price']} ₽</td>".
          '</tr>';
    }
  ?>
</table>
    </div>
</body>
</html>
