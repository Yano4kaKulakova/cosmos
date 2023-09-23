<!DOCTYPE html>
<html land="ru">
<title>Заявка на посещение</title>

<style type="text/css"> 
    h1 {
        padding-top: 120px;
        padding-left: 40px;
        font-family: 'Montserrat', sans-serif; 
        font-size: 23px;
        color:black;
    }
    form {
        padding-left: 40px;
    }
    button {
    display: inline-block;
    vertical-align: top;
    padding: 5px 10px;
    border: 3px solid purple;
    color: purple;
    text-transform: uppercase;
    font-size: 16px;
    transition: background .1s linear, color .1s linear;
}

    button:hover {
    background-color: purple;
    color: white;
}
    input, option, select {
    border: 3px solid orange;
    border-collapse: collapse;
    font-size: 18px;
    }
</style>

<head>
  <meta charset="UTF-8">
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz@8..144&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">  
  <title>cosmos</title>
</head>

<body>
<header class="header">
     <div class="container">
         <div class="header__inner">
         <a class="header__logo" href="index.php"><img src="assets/images/logo.jpg" ></a>
             <info class="info"><a>Смоленск, Октябрьской Революции, 9к4<br/>+7 (952) 531-96-56<br/></a></info>
             <nav class="nav">    
             <a class="nav__link" href="index.php">ГЛАВНАЯ</a>
             <a class="nav__link" href="login.php">ЛИЧНЫЙ КАБИНЕТ</a>
             <a class="nav__link" href="index.php#stock">АКЦИИ</a> 
             <a class="nav__link" href="index.php#contacts">КОНТАКТЫ</a> 
             </nav>
         </div>
     </div>
     </header>
    
    <h1>Формирование заявки на посещение батутного центра</h1>
<form method="post" action="apply.php">
    <?php
  // Подключение к базе данных MySQL.
  $link = mysqli_connect('localhost', 'root', 'root', 'cosmos');
    if (!$link) {
      echo 'Отсутствует соединение с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
// Делаем выборку из таблицы.
  $sql = "SELECT * FROM `services`";
  $result_select = mysqli_query($link, $sql);

  	echo "<select name = 'service'>";
  	echo "<option value='0'>Выберите услугу</option>";
  		while($object = mysqli_fetch_object($result_select)){
  echo "<option value = '$object->name' > $object->name </option>";}
  	echo "</select>";
  	?><br>
    <br><input type="datetime-local" class="form-control" name="date_v" id="date_v" placeholder="Введите дату и время посещения"><br>
    <br><input type="text" class="form-control" name="name" id="name" placeholder="Введите ФИО" size="40"><br>
    <br><input type="text" class="form-control" name="phone" id="phone" placeholder="Введите номер телефона" size="40"><br>
    <br><button class="btn" type="submit">Отправить</button><br>
</form>
</body>
</html>
