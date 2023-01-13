<?
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Форма входа</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

   <div class="container">
      <h2>Форма входа</h2>
      <form class="form-horizontal" method="post" action="check_aut.php">
         <div class="form-group">
            <label class="control-label col-sm-2" for="login">Логин:</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="login" placeholder="Введите логин" name="login">
            </div>
         </div>
  
         <div class="form-group">
            <label class="control-label col-sm-2" for="password">Пароль:</label>
            <div class="col-sm-10">
               <input type="password" class="form-control" id="password" placeholder="Введите пароль" name="password">
            </div>
         </div>
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <input type="submit" value="Войти" name="voity">
            </div>
         </div>
      </form>
   </div>

</body>

</html>