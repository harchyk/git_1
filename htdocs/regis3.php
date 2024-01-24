<?php
//error_reporting(E_ERROR);
// Подключение к базе данных
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test_BD";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
die("Connection failed: ". $conn->connect_error);
}
 
if (isset($_POST['button'])) {
// Получение данных из формы
$surname1 = $_POST["surname1"];
$name1 = $_POST["name1"];
$middle1 = $_POST["middle1"];
$birthday1 = $_POST["birthday1"];
$sql = "INSERT INTO ребенок (surname1, name1, middle1, birthday1) VALUES ('$surname1', '$name1', '$middle1', '$birthday1')";
}
if ($conn->query($sql) === true) {
echo "";
} else {
echo "Ошибка: " . $sql . "
" . $conn->error;
}

$conn->close();
?>

<html style = "overflow: hidden;">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-wigth">
  <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
  <link rel="stylesheet" href="css/style.css">
</head>
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


        <div class = "block3">
          <h2 class = "reb">Документы ребенка </h2>
          <br>
        <form action="regis2.php" method="post" class = "container1" id = "container1">
<?php
                  // Получаем дату рождения пользователя из формы
                  $birthday = $_POST['birthday1'];

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
                    echo '<label>№ сведетельства о рождении</label>';
                    echo '<input type="namber" name="nomer_sved">';
                    echo '<label>Дата выдачи</label>';
                    echo '<input type="date" name="date_sved">';
                    }

                    // Проверяем наличие $_POST['age'] и задаем значение по умолчанию
                ?> 
                <br>
                <br>  
        <select name="direction" id="direction" required>
        <option>Выберите направления</option>
<?php
// Создаем опции для выпадающего списка на основе возрастных рамок
if ($age >= 5 && $age <= 9) {
echo '<option >Основы алгоритмики и логики: Базовый курс</option>';
}
if ($age > 9 && $age <= 12) {
echo '<option >Основы алгоритмики и логики: Продвинутый уровень</option>';
}
if ($age > 8 && $age <= 10) {
    echo '<option >Роборазвивайка</option>';
    }
    if ($age > 10 && $age <= 12) {
      echo '<option >Робототехника «Базовый курс»</option>';
      }
      if ($age > 12 && $age <= 15) {
        echo '<option >Робототехника «Продвинутый курс»</option>';
        }
        if ($age > 15 && $age <= 16) {
          echo '<option >Разработка VR/AR: «Базовый курс»</option>';
          }
          if ($age > 16 && $age <= 18) {
            echo '<option >Разработка VR/AR: «Продвинутый курс»</option>';
            }
            if ($age > 16 && $age <= 18) {
              echo '<option >Моделирование VR/AR</option>';
              }
              if ($age > 13 && $age <= 16) {
                echo '<option >Программирование на Java: «Базовый курс»</option>';
                }
                if ($age > 16 && $age <= 18) {
                  echo '<option >Программирование на Java: «Продвинутый курс»</option>';
                  }
                if ($age > 15 && $age <= 16) {
                  echo '<option >	
                  Программирование на Python: «Базовый курс»</option>';
                  }
                  if ($age > 17 && $age <= 18) {
                    echo '<option >Программирование на Python: «Продвинутый курс»</option>';
                    }
                    if ($age > 10 && $age <= 13) {
                      echo '<option >Мобильная разработка: «Базовый курс»</option>';
                      }
                      if ($age > 13 && $age <= 16) {
                        echo '<option >Мобильная разработка: «Продвинутый курс»</option>';
                        }


?>
</select>

<br>
<input action="regis3.php" method="post" type="submit" name="button" class = "button" value="Зарегистрироваться">
                    </div>




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
</html>