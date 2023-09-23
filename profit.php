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
    select {
        border: 3px solid purple;
        font-size: 20px;
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
    <p>Посетители, услуги и даты посещения, приносящие максимальный доход <select name="input">
        <option value="">Выберите категорию</option>
        <option value="Посетитель">Посетитель</option>
        <option value="Услуга">Услуга</option>
        <option value="Дата">Дата и время</option>
    </select>
    <button type="submit">Поиск</button></p>
</form>
        
 
<table>
  <tr>
    <th>Категория</th>
    <th>Суммарная стоимость</th>

  </tr>
  <?php
    $input = $_REQUEST['input'];  
      if($input == 'Посетитель'):
    $sql = mysqli_query($link, 'SELECT `name`, SUM(`price`) AS sum FROM `visits` GROUP BY `name` ORDER BY sum DESC');
    while ($result = mysqli_fetch_array($sql)) {
      echo '<tr>'.
          "<td>{$result['name']}</td>".
          "<td align='center'>{$result['sum']} ₽</td>".
          '</tr>';
    }
              endif;
    if($input == 'Услуга'):
    $sql = mysqli_query($link, 'SELECT `service`, SUM(`price`) AS sum FROM `visits` GROUP BY `service` ORDER BY sum DESC');
    while ($result = mysqli_fetch_array($sql)) {
      echo '<tr>'.
          "<td>{$result['service']}</td>".
          "<td align='center'>{$result['sum']} ₽</td>".
          '</tr>';
    }
      endif;
              
    if($input == 'Дата'):
    $sql = mysqli_query($link, 'SELECT `date`, SUM(`price`) AS sum FROM `visits` GROUP BY `date` ORDER BY sum DESC');
    while ($result = mysqli_fetch_array($sql)) {
      echo '<tr>'.
          "<td>{$result['date']}</td>".
          "<td align='center'>{$result['sum']} ₽</td>".
          '</tr>';
    }
      endif;
    
  ?>
</table>
    </div>
</body>
</html>
