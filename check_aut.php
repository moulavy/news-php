<?php
session_start();


  if(isset($_SESSION['logged_user']))
 {
     header("Location: admin.php");
 }
 


$login=$_POST['login'];
$password=$_POST['password'];


$link = mysqli_connect(
            'localhost', 
            'id16472932_milana',       /* Имя пользователя */
            'Milana~Kulieva5',   /* Используемый пароль */
            'id16472932_news');     /* База данных для запросов по умолчанию */

$result=mysqli_query($link, "SELECT login FROM users WHERE login = '$login'");
$row = mysqli_fetch_assoc($result);
$result1=mysqli_query($link, "SELECT password FROM users WHERE password = '$password'");
$row1 = mysqli_fetch_assoc($result1);
if ($login==NULL or $password==NULL) 
{  
header("Location: login.php");
exit;
}
if ($row == NULL or $row1==NULL) 
{
    
    header("Location: login.php");
    exit;
}
else{
$result2=mysqli_query($link, "SELECT id FROM users WHERE login = '$login'");
$row2 = mysqli_fetch_assoc($result2);
$_SESSION['user_id']=$row2['id'];

$result3=mysqli_query($link, "SELECT name FROM users WHERE login = '$login'");
$row3 = mysqli_fetch_assoc($result3);
$_SESSION['user_name']=$row3['name'];

$result4=mysqli_query($link, "SELECT surname FROM users WHERE login = '$login'");
$row4 = mysqli_fetch_assoc($result4);
$_SESSION['user_surname']=$row4['surname'];

$_SESSION['logged_user'] = $login;

header("Location: admin.php");
}
