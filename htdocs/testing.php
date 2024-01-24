<!DOCTYPE html>
<html>
<head>
<title>Регистрация</title>
</head>
<body>
<h2>Регистрация</h2>

<form action="" method="post">
<label for="name">Имя:</label>
<input type="text" name="name" required>

<label for="email">Email:</label>
<input type="email" name="email" required>

<label for="dob">Дата рождения:</label>
<input type="date" name="birthday" required>

<input type="submit" name="submit" value="Зарегистрироваться">
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
} else {
// Обычные поля для регистрации без паспортных данных
echo '<label>Email:</label>';
echo '<input type="email" name="email">';
echo '<label>Пароль:</label>';
echo '<input type="password" name="password">';
}
?>
$sql = "INSERT INTO Учасники1 (surname1, name1, middle1, birthday1, passport_number, passport_issue_date, passport_issued_by, nomer_sved, date_sved, direction, cours) VALUES ('$surname1', '$name1', '$middle1', '$birthday1', '$passport_number', '$passport_issue_date', '$passport_issued_by', '$nomer_sved', '$date_sved', '$_cours', '$direction')";
}
if ($conn->query($sql) === true) {
echo "<h1>Спасибо, вы зарегестрированы, в ближайшее время с вами свяжеться администратор!</h1>";
} else {
echo "Ошибка: " . $sql . "
" . $conn->error;
}

$conn->close();




<?php
session_start();

if(isset($_POST['submit_button'])) { // Проверяем, была ли отправлена форма
$_SESSION['selected_option'] = $_POST['select_list']; // Сохраняем выбранное значение списка
}
?>

<form method="post" action="">
<select name="select_list">
<option value="option1" <?php if(isset($_SESSION['selected_option']) && $_SESSION['selected_option'] == 'option1') echo 'selected="selected"'; ?><>Option 1</option>
<option value="option2" <?php if(isset($_SESSION['selected_option']) && $_SESSION['selected_option'] == 'option2') echo 'selected="selected"'; ?><>Option 2</option>
<option value="option3" <?php if(isset($_SESSION['selected_option']) && $_SESSION['selected_option'] == 'option3') echo 'selected="selected"'; ?><>Option 3</option>
</select>


<input type="submit" name="submit_button" value="Submit">
</form>

<?php
// Установка значений по умолчанию
$name = "";
$age = "";

// Обработка отправки формы
if (isset($_POST["submit"])) {
$name = $_POST["name"];
$age = $_POST["age"];
}

// Вывод формы HTML
?>

<form method="post">
<label for="name">Имя:</label>
<input type="text" name="name" id="name" value="<?php echo $name; ?>">


<label for="age">Возраст:</label>
<input type="text" name="age" id="age" value="<?php echo $age; ?>">


<input type="submit" name="submit" value="Отправить">
</form>