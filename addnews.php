<?php
session_start();
$title=$_POST['title'];
$description=$_POST['description'];
$text=$_POST['text'];
$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['user_name'];
$user_surname=$_SESSION['user_surname'];

$link = mysqli_connect('localhost','id16472932_milana','Milana~Kulieva5', 'id16472932_news');  

$sql1 = "INSERT INTO `news_feed`( `user_id`, `title`, `description`, `text`,`user_name`,`user_surname`) VALUES ('$user_id','$title','$description','$text','$user_name','$user_surname')";
$result1 = mysqli_query($link, $sql1);
?>