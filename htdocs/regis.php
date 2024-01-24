<?php
error_reporting(E_ERROR);
// Подключение к базе данных
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "mysait";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
die("Connection failed: ". $conn->connect_error);
}
 
$surname = "";
$name = "";
$middle = "";
$phone = "";
$email = "";
// Получение данных из формы
$surname = $_POST['surname'];
$name = $_POST['name'];
$middle = $_POST['middle'];
$phone = $_POST['phone'];
$email = $_POST['Email'];

// Добавление данных в базу данных
$sql = "INSERT INTO родитель (surname, name, middle, phone, email) VALUES ('$surname', '$name', '$middle', '$phone', '$email')";

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
      <?php
      // error_reporting(E_ERROR);
$surname1 = "";
$name1 = "";
$middle1 = "";
$birthday1 = "";


// Обработка отправки формы
if (isset($_POST["button"])) {
$surname1 = $_POST["surname1"];
$name1 = $_POST["name1"];
$middle1 = $_POST["middle1"];
$birthday1 = $_POST["birthday1"];
}

// Вывод формы HTML
?>
<div class="blok2">
              <h1 class = "reb">Ребенок</h1>
              <br>
                <form action="regis3.php" method="post" class = "container" id = "container">
                Фамилия ребенка <input type = "text" name = "surname1"  id = "surname1" value = "<?php echo $name1; ?>" >
                Имя ребенка <input type = "text" name = "name1"  id = "name1" value = "<?php echo $middle1; ?>" >
                Отчество ребенка <input type = "text" name = "middle1" id = "middle1" value = "<?php echo $name1; ?>" >
                <br>
                <label for="dob">Дата рождения:</label>
                <input type="date"  name="birthday1" value = "<?php echo $birthday1; ?>" >
                
            <br>
            
<br>
<input action="regis3.php" method="post" type="submit" name="button" class = "button" value="Далее">
                
                  



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