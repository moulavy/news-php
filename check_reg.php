<?php

session_start();

  if(isset($_SESSION['logged_user']))
 {
     header("Location: admin.php");
 }
 
$login=$_POST['login'];
$password=$_POST['password'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$email=$_POST['email'];

$link = mysqli_connect('localhost', 'id16472932_milana','Milana~Kulieva5','id16472932_news'); 
$result = mysqli_query($link, "SELECT login FROM users WHERE login = '$login'");
$row = mysqli_fetch_assoc($result);
if ($row != NULL) 
{
    header("Location: reg.php");
    exit;
}
else
{
    if ($login==NULL or $password==NULL or $name==NULL or $surname==NULL)
    {  
    header("Location: admin.php");
    exit;
    }
    else
    {
    $sql = "INSERT INTO users SET login='$login',password='$password',name='$name',surname='$surname',email='$email' ";
    $result = mysqli_query($link, $sql);
    
    
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
}



/* Освобождаем используемую память */
mysqli_free_result($result);
/* Закрываем соединение */
mysqli_close($link);
?>