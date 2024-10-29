<?php include 'process.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Регистрация/авторизация</title>
        <link rel="stylesheet" href="log.css">
    </head>
<body style="background-color: #212121;">
<div style="display: flex;justify-content: center;align-items: center;height: 90vh;  ">
<div class="wrapper">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Авторизация</div>
                     <form class="flip-card__form" method="post" action="login.php">
                        <input class="flip-card__input" name="inputname" placeholder="Имя пользователя" type="text" aria-invalid="true" required>
                        <input class="flip-card__input" name="inputpassword" placeholder="Пароль" type="paswword" aria-invalid="true" required>
                        <button class="flip-card__btn" type="submit" name="auth">Войти</button>
                     </form>
                     <p><?php echo $message; ?></p>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Регистрация</div>
                     <form class="flip-card__form" method="post" action="menu.php">
                        <input class="flip-card__input" name="inputname" placeholder="Имя пользователя" type="name" aria-invalid="true" required>
                        <input class="flip-card__input" name="inputpassword" placeholder="Пароль" type="password" aria-invalid="true" required>
                      
                        <button class="flip-card__btn" type="submit" name="registr">Вперед!</button>
                     </form>
                     
                  </div>
               </div>
            </label>
        </div>   
   </div>
</div>
</body>
</html>