<html land="ru">
<title>Результаты анкетирования</title>

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

<?php 
echo "<h1 class=\"promotion\">Результаты анкетирования</h1>";
$conn = mysqli_connect('localhost', 'root', 'root', 'cosmos') or die('Connection failed: ' . $conn->connect_error);
$sql = mysqli_query($conn, "SELECT`anketa`.`id_otv`, `users`.`name`, `anketa`.`phone`, `anketa`.`sex`, `anketa`.`age`, `anketa`.`freq`, `anketa`.`visit`, `anketa`.`crit`, `anketa`.`rate`, `anketa`.`improve` FROM `anketa`LEFT JOIN `users`ON `anketa`.`phone`=`users`.`phone`");

echo '<table border=1 width=1250px>
<tr>
<th scope="col">№</th>
<th scope="col">Респондент</th>
<th scope="col">Телефон</th>
<th scope="col">Пол</th>
<th scope="col">Возраст</th>
<th scope="col">Частота</th>
<th scope="col">Посещение</th>
<th scope="col">Критерий</th>
<th scope="col">Оценка</th>
<th scope="col">Улучшения</th>';

while ($result = mysqli_fetch_array($sql)) {
    $i = 0;
    echo "<tr>";
    while($i < mysqli_field_count($conn)) {
        echo "<td>" . $result[$i] . "</td>";
        $i++;} 
    echo "</tr>";}
echo "</table>";

$sql1 = mysqli_query($conn, "SELECT COUNT(*) AS a
FROM `anketa`
WHERE (`anketa`.`age`='18-24' OR `anketa`.`age`='under18' OR `anketa`.`age`='25-34') AND `anketa`.`crit`='price'");
$a=mysqli_fetch_array($sql1);

$sql2 = mysqli_query($conn, "SELECT COUNT(*) AS b
FROM `anketa`
WHERE (`anketa`.`age`='18-24' OR `anketa`.`age`='under18' OR `anketa`.`age`='25-34') AND `anketa`.`crit`='safety'");
$b = mysqli_fetch_array($sql2);
    
$sql3 = mysqli_query($conn, "SELECT COUNT(*) AS c
FROM `anketa`
WHERE (`anketa`.`age`='35-44' OR `anketa`.`age`='over45') AND `anketa`.`crit`='price'");
$c = mysqli_fetch_array($sql3);
    
$sql4 = mysqli_query($conn, "SELECT COUNT(*) AS d
FROM `anketa`
WHERE (`anketa`.`age`='35-44' OR `anketa`.`age`='over45') AND `anketa`.`crit`='safety'");
$d=mysqli_fetch_array($sql4);

echo "<h1 class=\"promotion\">Результаты корреляционного анализа</h1>";
echo '<table border=1 width=700px>';

echo "<tr>";
echo "<th>";
    echo "Возраст/Критерий";
echo "</th>";
echo "<th>";
echo "Ценовые факторы";
echo "</th>";
echo "<th>";
echo "Неценовые факторы";
echo "</th>";
echo "</tr>";
echo "<tr>";
echo "<th>";
    echo "Младше 35";
echo "</th>";
echo "<th>";
    echo $a[0];
echo "</th>";
echo "<th>";
    echo $b[0];
echo "</th>";
echo "</tr>";
echo "<tr>";
echo "<th>";
    echo "Старше 35";
echo "</th>";
echo "<th>";
    echo $c[0];
echo "</th>";
echo "<th>";
    echo $d[0];
echo "</th>";
echo "</tr>";

echo "</table>";

echo "<p><br/>КОЭФФИЦИЕНТ КОНТИНГЕНЦИИ ВОЗРАСТА РЕСПОНДЕНТА И КРИТЕРИЯ ВЫБОРА БАТУТНОГО ЦЕНТРА<p>KКп = ";
$K=(($a[0]*$d[0]-$b[0]*$c[0])/sqrt(($a[0]+$b[0])*($b[0]+$d[0])*($a[0]+$c[0])*($c[0]+$d[0])));
print $K;

?>
</body>
</html>