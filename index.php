<?php
session_start();
$link = mysqli_connect('localhost','id16472932_milana','Milana~Kulieva5', 'id16472932_news');
if(isset($_SESSION['logged_user']))
{
    header("Location: admin.php");
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Новости</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Новости</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="reg.php"><span class="glyphicon glyphicon-user"></span> Регистрация</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <?php


    $result = mysqli_query($link, 'SELECT * FROM news_feed');
    while( $row = mysqli_fetch_assoc($result) )
    {
        ?>
        <div class="contentMY">
            <div class="titleMY"><?=$row['title']; ?> </div>
            <div class="descriptionMY"><?=$row['description']; ?></div>
            <div class="textMY"><?=$row['text']; ?></div>
            <div class="nameMY"><?=$row['user_name']; ?> <?=$row['user_surname']; ?></div>


        </div>
        <?php

    }

    ?>

</div>

</body>

</html>