<?php
require_once __DIR__ . '/boot.php';
//Отправка ID test
session_abort();
session_start();

$gth = false;

$user = null;
if (check_auth()) {
  // Получим данные пользователя по сохранённому идентификатору
  $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
  $stmt->execute(['id' => $_SESSION['user_id']]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  function pageUpdate(event) {




    document.cookie = "testID=" + event;


    window.location.href = 'http://localhost/test.php';
  }
</script>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-wigth">
  <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
  <title>Регистрация</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="wrapper">
    <div class="conteiner">
      <!-- <div class="row py-5"> -->
      <!-- <div class="" style="width: 100%;display: inline-block;"> -->

        <?php if ($user) { ?>

          <h1 style="float: left;" onclick="pageUpdate('log.php')">Добро пожаловать обратно, <?= htmlspecialchars($user['username']) ?>!</h1>

          <form class="" method="post" action="do_logout.php">
            <button type="submit" style="float: right;" class="btn btn-primary">Выход</button>
            <a class="btn btn-outline-primary" style="float: right;margin-right: 20px;" href="add_test.php">Добавить тест</a>
          </form>
      </div>


    



      <?php } ?>
      <html>  
      <div class="header">
        <div class="logo_titles">
        <div class="logo">
        <div class="images"> 
          <img class="image" src = "img\image 32.png" width = "30" height = "30"> 
        </div>
        </div>
        <div class="titless">
        <p class="titles">центр цифрового 
          образования детей 
          “it-куб”Ангарск</p>
      </div>
      </div>
      <div class="navigation">
        <!-- <div class="onas">
        <select class="onass" >
          <option value="1">О Нас</option>
          <option value="2">О центре</option>
          <option value="3">Преподаватели</option>
          <option value="4">Документы</option>
          <option value="5">Фотогаллерея</option>
        </select>
        </div>
        <div class="naprav">
        <select class="naprav">
          <option value="1">Направления</option>
          <option value="2">Программирование роботов</option>
          <option value="3">Основы программирования на Java</option>
          <option value="4">Программирование на Python</option>
          <option value="5">Мобильная разработка</option>
          <option value="6">Разработка VR/AR – приложений</option>
          <option value="7">Основы алгоритмики и логики</option>
        </select>
        </div>
        <button class="novosty">Новости</button>
        <button class="ras">Расписание</button>
        <button class="contact">Контакты</button> -->

        <a href="" class="novosty">Главная</a>
      </div>
      </div>
    <!-- // <h1 style="text-align: center;"></h1> -->
      <form action="test.php" method="post">
        <?php /*

          require_once __DIR__ . '/boot.php';

          $stmt = pdo()->prepare("SELECT * FROM `test`");
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
          do {
            $data = "<input class='btn btn-outline-primary' style ='margin-top: 5px;' type='button' id = '" . $row[0] . "' value='Пройти тест:" . $row[1] . "'onclick=pageUpdate($row[0])><br>";
            print $data;
          } while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));

        */?>
        


      </form>
      <div class="blok1">
            <h1 class = "itog">Регистрация Участника it"КУБ"</h1>
                <h2 class = "itog">Сведения о родителе (законном представлители)</h2>
                <form action="regis.php" method="post" class = "container">
                  Фамилия <input type = "text" name = "surname"  >
                  Имя <input type = "text" name = "name"  >
                  Отчество <input type = "text" name = "middle"  >
                  Номер телефона <input type = "number" name = "phone"  >
                  Email <input type = "text" name = "Email"  > 
                  <br>
                  <br>
                  <input class = "dalee" type="submit" name="submit" value="Далее">
                </form>
            </div>

          <!-- </div>

            <div class="blok2">
              <h2>Ребенок</h2>
            <form action="" method="post" class = "container1">
            Фамилия ребенка <input type = "text" name = "surname1" value="<?php echo $surname1; ?>">
            Имя ребенка <input type = "text" name = "name1" value="<?php echo $name1; ?>">
            Отчество ребенка <input type = "text" name = "middle1" value="<?php echo $middle1; ?>">
            <br>
            <label for="dob">Дата рождения:</label>
            <input type="date" name="birthday" value="<?php echo $birthday; ?>">
            <br>
            <input type="submit" name="submit" value="Рассчитать">
            <?php
                  // Получаем дату рождения пользователя из формы
                  $birthday = $_POST['birthday'];

                  // Рассчитываем, сколько лет пользователю
                  $age = date_diff(date_create($birthday), date_create('today'))->y;
                  echo "Ваш возраст: $age лет";


                  // Проверяем, достиг ли пользователь 14 лет
                  if ($age >= 14) {      
                  // Дополнительные поля для ввода паспорта
                  echo '<label>Серия и номер паспорта:</label>';
                  echo '<input type="text" name="passport_number">';
                  echo '<label>Дата выдачи паспорта:</label>';
                  echo '<input type="date" name="passport_issue_date">';
                  echo '<label>Кем выдан паспорт:</label>';
                  echo '<input type="text" name="passport_issued_by">';
                  }
                  else {
                    // Обычные поля для регистрации без паспортных данных
                    echo '<label>Email:</label>';
                    echo '<input type="email" name="email">';
                    echo '<label>Пароль:</label>';
                    echo '<input type="password" name="password">';
                    }
                ?> 



            

            




    </div>
    
    <!-- <form action="regis.php" method="post" class = "container">
            <p> Фамилия родителя(Законного представителя)</p>
            <input type = "text" name = "surname">
            <p> Имя родителя(Законного представителя)</p>
            <input type = "text" name = "name">
            <p> Отчество родителя(Законного представителя)</p>
            <input type = "text" name = "middle">
            <p> Номер телефона </p>
            <input type = "number" name = "phone">
            <p> Email </p>
            <input type = "text" name = "Email"> 
            <br>
          </form>


          <form action="" method="post" class = "container1">
            <p> Фамилия ребенка</p>
            <input type = "text" name = "surname">
            <p> Имя ребенка</p>
            <input type = "text" name = "name">
            <p> Отчество ребенка</p>
            <input type = "text" name = "middle">
            <p> Курс </p>
            <select class="kyrs">
              <option value="1">Программирование роботов</option>
              <option value="2">Основы программирования на Java</option>
              <option value="3">Программирование на Python</option>
              <option value="4">Мобильная разработка</option>
              <option value="5">Разработка VR/AR – приложений</option>
              <option value="6">Основы алгоритмики и логики</option>
            </select>
            <br>
            <label for="dob">Дата рождения:</label>
            <input type="date" name="birthday">
            <input type="submit" name="submit" value="Рассчитать">
            </form>
            <?php
                  // Получаем дату рождения пользователя из формы
                  $birthday = $_POST['birthday'];

                  // Рассчитываем, сколько лет пользователю
                  $age = date_diff(date_create($birthday), date_create('today'))->y;
                  echo "Ваш возраст: $age лет";


                  // Проверяем, достиг ли пользователь 14 лет
                  if ($age >= 14) {      
                  // Дополнительные поля для ввода паспорта
                  echo '<label>Серия и номер паспорта:</label>';
                  echo '<input type="text" name="passport_number">';
                  echo '<label>Дата выдачи паспорта:</label>';
                  echo '<input type="date" name="passport_issue_date">';
                  echo '<label>Кем выдан паспорт:</label>';
                  echo '<input type="text" name="passport_issued_by">';
                  }
                ?> -->

    <div class="footer">
      <div class="footer_logo">
      <img class = "footer-image1" src="img\Без имени-ап 1.png">
        <img class="footer-logo" src="img\image 1.png" alt="">
      </div>
    <div class="infor">
      <p class = "info"> Кто Мы <br>
        Центр цифрового образования<br>
«IT-КУБ» – новый формат<br> технической подготовки <br> школьников от 7 до 18 лет <br>
в направлении информационных технологий </p>
    </div>
    <div class="footer_navigation">
    
        <a href="" class="footer_novosty">Главная</a>
    </div>
    </div>
    </div>
  </div>

</body>

</html>