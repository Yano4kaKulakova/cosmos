<html land="ru">
<title>Посещения батутного центра</title>

<style type="text/css"> 
    h1 {
        padding-top: 130px;
        padding-left: 40px;
        font-family: 'Montserrat', sans-serif; 
        font-size: 18px;
        color:black;
        }
    p {
        padding-left: 40px;
        font-family: 'Montserrat', sans-serif; 
        font-size: 16px;
        color:black;
        }
    table {
        margin-left: 40px;
        font-family: 'Montserrat', sans-serif; 
        font-size: 14px;
        color:black;
        background-color: yellow;
        border: 3px solid purple;
        border-collapse: collapse;
        width: 93%;
        }
    th, td {
        border: 3px solid purple;
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
<h1>Посещения батутного центра</h1>

  <div class="service__container">
<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'cosmos');
    if (!$link) {
      echo 'Отсутствует соединение с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
  ?>
<table>
  <tr>
    <th>№</th>
    <th>Дата и время посещения</th>
    <th>Посетитель</th>
    <th>Услуга</th>
    <th>Стоимость посещения</th>
    <th></th>
  </tr>
  <?php
    $sql = mysqli_query($link, 'SELECT * FROM `visits` ORDER BY `date`');
    while ($result = mysqli_fetch_array($sql)) {
      echo '<tr>'.
          "<td>{$result['id']}</td>".
          "<td>{$result['date']}</td>".
          "<td>{$result['name']}</td>".
          "<td>{$result['service']}</td>".
          "<td>{$result['price']} ₽</td>".
          "<td><a href='visits_delete.php?id={$result['id']}'>Удалить</a></td>".
          '</tr>';
    }
  ?>
</table>
    </div>
</body>
</html>