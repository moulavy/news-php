<?php
session_start();
$link = mysqli_connect('localhost', 'id16472932_milana', 'Milana~Kulieva5', 'id16472932_news');
if (!isset($_SESSION['logged_user'])) {
   header("Location: login.php");
}
if ($_GET['del'] > 0) {
   $sql2 = "DELETE FROM `news_feed` where `id`='{$_GET['del']}'";
   $result2 = mysqli_query($link, $sql2);
}
if ($_GET['edit'] > 0) {
   $result = mysqli_query($link, "SELECT * FROM news_feed WHERE `id`='{$_GET['edit']}'");
   $edit_row = mysqli_fetch_assoc($result);
}
if (isset($_POST['title'])) {
   $title = $_POST['title'];
   $description = $_POST['description'];
   $text = $_POST['text'];
   $user_id = $_SESSION['user_id'];
   $user_name = $_SESSION['user_name'];
   $user_surname = $_SESSION['user_surname'];


   if ($_GET['edit'] > 0) {
      $sql3 = "UPDATE `news_feed` set `title`='$title',`description`='$description',`text`='$text',`user_id`='$user_id',`user_name`='$user_name',`user_surname`='$user_surname' where `id`='{$_GET['edit']}'";
      $result3 = mysqli_query($link, $sql3);
   } else {
      $sql1 = "INSERT INTO `news_feed`( `user_id`, `title`, `description`, `text`,`user_name`,`user_surname`) VALUES ('$user_id','$title','$description','$text','$user_name','$user_surname')";
      $result1 = mysqli_query($link, $sql1);
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Добавление статьи</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="style.css">
</head>

<body>

   <div class="container">
      <div class="name_surname">
         <div><?= $_SESSION['user_name']; ?> <?= $_SESSION['user_surname']; ?></div>
         <a href="logout.php" class='btn btn-danger'>Выйти</a>
      </div>
      <h2>Добавление статьи</h2>
      <form class="form-horizontal" method="post">
         <div class="form-group">
            <label class="control-label col-sm-2" for="title">Заголовок новости:</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="title" placeholder="Введите заголовок" name="title" value='<?= $edit_row['title'] ?>'>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="description">Описание новости:</label>
            <div class="col-sm-10">
               <textarea type="text" class="form-control" id="description" placeholder="Введите краткое описание новости" name="description"><?= $edit_row['description'] ?></textarea>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="text">Текст новости:</label>
            <div class="col-sm-10">
               <textarea type="text" class="form-control" id="text" placeholder="Введите полный текст новости" name="text"><?= $edit_row['text'] ?></textarea>
            </div>
         </div>

         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <?php if ($_GET['edit'] > 0) { ?>
                  <button type="submit" class="btn btn-default">Сохранить изменения</button>
                  <a href="admin.php" class='btn btn-info'>Выйти из режима редактирования</a>
               <?php } else { ?> <button type="submit" class="btn btn-default">Добавить</button>
               <?php } ?>
            </div>
         </div>
      </form>
      <hr>


      <?php


      $result = mysqli_query($link, 'SELECT * FROM news_feed');
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
         <div class="contentMY">
            <div class="titleMY"><?= $row['title']; ?> </div>
            <div class="descriptionMY"><?= $row['description']; ?></div>
            <div class="textMY"><?= $row['text']; ?></div>
            <div class="nameMY"><?= $row['user_name']; ?> <?= $row['user_surname']; ?></div>
            <div class="knopki">
               <div class="delMY"><a class='btn btn-danger' href='?del=<?= $row['id'] ?>'>Удалить</a></div>
               <div class="editMY"><a class='btn btn-info' href='?edit=<?= $row['id'] ?>'>Редактировать</a></div>
            </div>
         </div>
      <?php

      }

      ?>

   </div>
</body>

</html>