<?php
$mysql = new mysqli('localhost','root','root','cosmos');
$service_id = $_GET['id'];
$result = $mysql->query("SELECT * FROM `services` WHERE `id`='$service_id'");
$service = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html land="ru">
<title>Услуги</title>
<style type="text/css"> 
    h1 {
        padding-top: 130px;
        padding-left: 40px;
        color: black;
        font-size: 22px;
        }
    form {
        padding-top: 10px;
        padding-left: 40px;
    }
    input {
        border: 3px solid orange;
        font-size: 18px;
    }
    button {
    display: inline-block;
    vertical-align: top;
    padding: 4.5px 40px;
    border: 3px solid purple;
    color: purple;
    text-transform: uppercase;
    font-size: 15px;
    transition: background .1s linear, color .1s linear;
}
    button:hover {
    background-color: purple;
    color: white;
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
             <a class="nav__link" href="index.php">ЦЕНЫ</a>
             <a class="nav__link" href="index.php">АКЦИИ</a>   
             <a class="nav__link" href="index.php">КОНТАКТЫ</a> 
             </nav>
         </div>
     </div>
</header>
<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'cosmos');
    if (!$link) {
      echo 'Отсутствует соединение с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
  ?>
<h1>Редактирование</h1>
    <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $service['id'] ?>">
    <input type="text" name="name" value="<?= $service['name'] ?>" placeholder="Введите наименование услуги" size="42"><br>
    <br><input type="number" name="price" value="<?= $service['price'] ?>" placeholder="Введите стоимость"><br>
    <br><button type="submit">Изменить услугу</button>
    </form>
</body>
</html>