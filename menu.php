<?php include 'process.php';?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>меню CRUD</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            .modal {
            display: none; /* Скрыть модальное окно по умолчанию */
            position: fixed; /* Открывается поверх всего */
            z-index: 1; /* Перед другими элементами */
            left: 0; top: 0; width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Полупрозрачный фон */
        }
        .modal-content {
            margin-left: 35%;
            margin-top: 5%;
            justify-content: center;
            align-items: center;
            height: 90vh;
            padding: 20px;
            width: 300px; /* Ширина модального окна */
        }
        .close {
            text-align: right;
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        </style>
    </head>

    <body style="background-image: url(back.jpg);margin-left: 20%; margin-right: 20%; display: block; justify-content: center;align-items: center;">

          <button id="openCreate"> Создать</button>
        
          <a href="logout.php"><button> Выход</button></a>
         
<div id="create" class="modal">
<div class="modal-content">
<div class="wrapper">
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Создать новую запись</div>
                     <form style="width: 300px;" class="flip-card__form" method="POST" action="">
                        <input class="flip-card__input" type="text" id="username" name="username" placeholder="Имя пользователя" required>
                        <input class="flip-card__input" type="password" id="password" name="password" placeholder="Пароль" required>
                        <button class="width: 100px; " type="submit" name="add">Создать!</button>
                        <button class="width: 100px;" id="close">Отменить!</button>
                     </form>
                  </div>
               </div>
           
   </div>
   </div>
   </div>
   <script>
        // Получить элементы модального окна
        var create = document.getElementById('create');
        var openCreate = document.getElementById('openCreate');
        var spann = document.getElementById('close');

        // Открывает модальное окно при нажатии на кнопку
        openCreate.onclick = function() {
            create.style.display = 'block';
        };

        // Закрывает модальное окно при нажатии на 'X'
        spann.onclick = function() {
            create.style.display = 'none';
        };

        // Закрывает модальное окно при нажатии вне его области
        window.onclick = function(event) {
            if (event.target == create) {
                create.style.display = 'none';
            }
        };
    </script>
   
    <?php if ($result) {
        echo "<table>";
        echo "<thead><tr><td>ID</td><td>Имя пользователя</td><td>Пароль</td><td>Действие</td></tr></thead>"; // Заголовки таблицы

        // Вывод данных
        foreach ($result as $row) { ?>
           <tbody>
            <tr>
            <?php echo "<td>" . htmlspecialchars($row['id']) . "</td>"; // Вывод id
            echo "<td>" . htmlspecialchars($row['username']) . "</td>"; // Вывод username
            // Хеширование пароля для отображения
            $encryptedPassword = base64_encode($row['password']); // Кодируем пароль в base64
            echo "<td>" . htmlspecialchars($encryptedPassword) . "</td>"; ?>
            <td>  <button id="openEdit<?php echo htmlspecialchars($row['id'])?>"> Редактировать</button> <button id="openDelete<?php echo htmlspecialchars($row['id'])?>"> Удалить</button> </td>
            </tr>
            <div id="delete<?php echo htmlspecialchars($row['id'])?>" class="modal">
<div class="modal-content">
<div class="wrapper">
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Удалить запись №<?php echo htmlspecialchars($row['id'])?></div>
                     <form style="width: 300px;" class="flip-card__form" method="POST" action="?id=<?php echo htmlspecialchars($row['id'])?>">
                        <button class=" " type="submit" name="delete">Удалить!</button>
                        <button class=" " id="close">Отменить!</button>
                     </form>
                  </div>
               </div>  
   </div>
   </div>
   </div>
   <script>
        // Получить элементы модального окна
        var delete<?php echo htmlspecialchars($row['id'])?> = document.getElementById('delete<?php echo htmlspecialchars($row['id'])?>');
        var openDelete<?php echo htmlspecialchars($row['id'])?> = document.getElementById('openDelete<?php echo htmlspecialchars($row['id'])?>');
        var span<?php echo htmlspecialchars($row['id'])?> = document.getElementById('close');

        // Открывает модальное окно при нажатии на кнопку
        openDelete<?php echo htmlspecialchars($row['id'])?>.onclick = function() {
            delete<?php echo htmlspecialchars($row['id'])?>.style.display = 'block';
        };

        // Закрывает модальное окно при нажатии на 'X'
        span<?php echo htmlspecialchars($row['id'])?>.onclick = function() {
            delete<?php echo htmlspecialchars($row['id'])?>.style.display = 'none';
        };

        // Закрывает модальное окно при нажатии вне его области
        window.onclick = function(event) {
            if (event.target == delete<?php echo htmlspecialchars($row['id'])?>) {
                delete<?php echo htmlspecialchars($row['id'])?>.style.display = 'none';
            }
        };
    </script>
            <div id="edit<?php echo htmlspecialchars($row['id'])?>" class="modal">
<div class="modal-content">
<div class="wrapper">
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Редактировать запись</div>
                     <form style="width: 300px;" class="flip-card__form" method="POST" action="?id=<?php echo htmlspecialchars($row['id'])?>">
                        <input class="flip-card__input" type="text" id="username" name="username" placeholder="Имя пользователя" value="<?php echo htmlspecialchars($row['username'])?>">
                        <input class="flip-card__input" type="password" id="password" name="password" placeholder="Пароль" value="<?php echo htmlspecialchars($row['password'])?>">
                        <button class="" type="submit" name="edit">Сохранить!</button>
                        <button class="" id="close">Отменить!</button>
                     </form>
                  </div>
               </div>
   </div>
   </div>
   </div>
    <script>
        // Получить элементы модального окна
        var edit<?php echo htmlspecialchars($row['id'])?> = document.getElementById('edit<?php echo htmlspecialchars($row['id'])?>');
        var openEdit<?php echo htmlspecialchars($row['id'])?> = document.getElementById('openEdit<?php echo htmlspecialchars($row['id'])?>');
        var span<?php echo htmlspecialchars($row['id'])?> = document.getElementById('close');

        // Открывает модальное окно при нажатии на кнопку
        openEdit<?php echo htmlspecialchars($row['id'])?>.onclick = function() {
            edit<?php echo htmlspecialchars($row['id'])?>.style.display = 'block';
        };

        // Закрывает модальное окно при нажатии на 'X'
        span<?php echo htmlspecialchars($row['id'])?>.onclick = function() {
            edit<?php echo htmlspecialchars($row['id'])?>.style.display = 'none';
        };

        // Закрывает модальное окно при нажатии вне его области
        window.onclick = function(event) {
            if (event.target == edit<?php echo htmlspecialchars($row['id'])?>) {
                edit<?php echo htmlspecialchars($row['id'])?>.style.display = 'none';
            }
        };
    </script>
            <?php } ?>
            </tbody>
       </table>
       <?php
    } else {
        echo "Нет записей в таблице usernames.";
    } ?>
          
    </body>
</html>