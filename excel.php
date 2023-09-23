<?php 

$connect = mysqli_connect('localhost','root','root','cosmos');
$output = '';
if(isset($_POST["export_excel"]))
{
    $sql = "SELECT * FROM `orders` WHERE `visit` = '-'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result)>0)
    {
        $output .= '
        <table class="table" bordered="1">
        <tr>
        <th>№</th>
        <th>Дата и время подачи заявки</th>
        <th>ФИО посетителя</th>
        <th>Номер телефона</th>
        <th>Дата и время посещения</th>
        <th>Выбранная услуга</th>
        </tr>
        ';
        while ($row = mysqli_fetch_array($result))
        {
            $output .='
            <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["date_o"].'</td>
            <td>'.$row["name"].'</td>
            <td>'.$row["phone"].'</td>
            <td>'.$row["date_v"].'</td>
            <td>'.$row["service"].'</td>
            </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=невыполненные_заявки.xls");
        echo $output;
    }
}
?>