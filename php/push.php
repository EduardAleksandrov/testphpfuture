<?php
$host='localhost';
$user='Will';
$password='password';
$database='testdb';
    
$date_today = date("Y.m.d"); 
$time_today = date("H:i:s");

 /*echo("Текущее время: $time_today и дата: $date_today .");*/
 
if(isset($_POST['names']) && isset($_POST['comment']) && !empty($_POST['names']) && !empty($_POST['comment'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $names = htmlentities(mysqli_real_escape_string($link, $_POST['names']));
    $comment = htmlentities(mysqli_real_escape_string($link, $_POST['comment']));
     
    // создание строки запроса
    $query ="INSERT INTO comments VALUES(NULL, '$names','$comment','$date_today','$time_today')";

    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));  

    // закрываем подключение
    mysqli_close($link);
    
		// для обновления страницы
		header("Location:index.php");
}
?>

