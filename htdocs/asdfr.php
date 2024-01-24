<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-wigth">
<link rel="stylesheet" href="css/style.css">
<title>Список участников</title>
</head>
<body>
<html>  
<div class="wrapper">
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
        <a href="http://localhost/asdfr.php" class="novosty">Главная</a>
      </div>
      </div>
<h1>Список зарегистрированных участников</h1>
<table>
<tr>
<th>id</th>
<th>Фамилия</th>
<th>Имя</th>
<th>Отчество</th>
<th>Телефон</th>
<th>email</th>
</tr>
<?php
// Подключение к базе данных
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "oleg";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Получение данных из таблицы
$sql = "SELECT * FROM учасники order by surname";
$result = $conn->query($sql);

if ($result->num_rows <> 0) {
// Вывод данных о зарегистрированных участниках
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" .$row["surname"]. "</td><td>" . $row["name"]. "</td><td>" . $row["middle"] . "</td><td>"
. $row["phone"]. "</td><td>" . $row["Email"]. "</td></tr>";
}
} else {
echo "0 results";
}
$conn->close();
?>
</table>
</div>
<div class="footer">
      <div class="footer_logo">
      <img class = "footer-image1" src="img\Без имени-ап 1.png">
        <img class="footer-logo" src="img\image 1.png" alt="">
      </div>
      
      <p class = "info"> Кто Мы <br>
        Центр цифрового образования<br>
«IT-КУБ» – новый формат<br> технической подготовки <br> школьников от 7 до 18 лет <br>
в направлении информационных технологий </p>
    
    <div class="footer_navigation">
        <!-- <a href="http://localhost/asdfr.php" class="footer_contact">База данных</a> -->
        <a href="" class="footer_novosty">Главная</a>
    </div>
</body>
</html>