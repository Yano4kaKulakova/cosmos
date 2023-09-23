<!DOCTYPE html>
<html land="ru">
<title>Личный кабинет</title>
<style type="text/css"> 
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
    input {
    border: 3px solid orange;
    border-collapse: collapse;
    font-size: 18px;
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
         <a class="header__logo" href="index.php#main"><img src="assets/images/logo.jpg" ></a>
             <info class="info"><a>Смоленск, Октябрьской Революции, 9к4<br/>+7 (952) 531-96-56</a></info>
             <nav class="nav">    
             <a class="nav__link" href="index.php">ГЛАВНАЯ</a>
             <a class="nav__link" href="service_asc.php">УСЛУГИ</a>
             <a class="nav__link" href="index.php#stock">АКЦИИ</a>   
             <a class="nav__link" href="index.php#contacts">КОНТАКТЫ</a> 
             </nav>
         </div>
     </div>
</header>
 
<div class="login__container">
    <?php
    if($_COOKIE['user']==''):
    ?>
    <div class="row">
        <div class="col">
            <h1>Регистрация</h1>
            <form method="post" action="check.php">
            <input type="text" class="form-control" name="name" id="name" placeholder="Введите ФИО" size="40"><br>
            <br><input type="text" class="form-control" name="phone" id="phone" placeholder="Введите номер телефона" size="40"><br>
            <br><input type="date" class="form-control" name="date" id="date" placeholder="Введите дату рождения" size="40"><br>
            <br><input type="text" class="form-control" name="login" id="login" placeholder="Придумайте логин" size="40"><br>
            <br><input type="password" class="form-control" name="pass" id="pass" placeholder="Придумайте пароль" size="40"><br>
            <br><button class="btn" type="submit">Зарегистрироваться</button><br>
            </form>
        </div>
        <div class="col">
            <h1>Авторизация</h1>
            <form method="post" action="auth.php">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
            <br><input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
            <br><button class="btn" type="submit">Авторизоваться</button><br>
            </form>
        </div>
        <?php else: ?>
        <h1>Здравствуйте, <?=$_COOKIE['user']?>!</h1>
        <a class="button" href="exit.php">Выход из личного кабинета</a>
        <h1>Перейти к формированию <a href="order.php">заявки на посещение</a></h1>
        <a class="button" href="order.php">Заявка на посещение<br>батутного центра</a>
        <h1>Перейти к заполнению <a href="/anketa.html">анкеты обратной связи</a></h1>
        <a class="button" href="anketa.html">Анкета обратной связи</a>
        <?php endif; ?>    
    </div>
    <?php
    if($_COOKIE['user']=='Администратор'):
    header('Location: /admin.php');
    ?>
    <?php endif; ?>
    <?php
    if($_COOKIE['user']=='Управляющий'):
    header('Location: /head.php');
    ?>
    <?php endif; ?>
    </div>
</body>
</html>
