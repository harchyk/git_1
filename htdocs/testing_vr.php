<!-- <form action="" method="post">
<label for="age">Возраст:</label>
<input type="number" name="age" id="age" required>

<label for="direction">Направление:</label>
<select name="direction" id="direction">
<?php
// Определяем возрастные рамки для разных направлений
$engineering_age = 18-25;
$biology_age = 16;
$history_age = 2-14;

// Проверяем наличие $_POST['age'] и задаем значение по умолчанию
$age = isset($_POST['age']) ? $_POST['age'] : 0;

// Создаем опции для выпадающего списка на основе возрастных рамок
if ($age >= $engineering_age) {
echo '<option value="engineering">Инженерное дело</option>';
}
if ($age >= $biology_age) {
echo '<option value="biology">Биология</option>';
}
if ($age >= $history_age) {
echo '<option value="history">История</option>';
}
?>
</select>

<button type="submit">Зарегистрироваться</button>
</form> -->



<form method="post">
<label for="direction">Выберите направление:</label>
<select name="direction">
<option value="информатика">Информатика</option>
<option value="математика">Математика</option>
<option value="биология">Биология</option>
 </select>
<?php
// Определяем массив направлений и связанных программ
$programs = array(
'информатика' => array(
'программная инженерия',
'системная инженерия',
'базы данных'
),
'математика' => array(
'прикладная математика',
'теоретическая математика',
'статистика'
),
'биология' => array(
'микробиология',
'генетика',
'биохимия'
)
);

// Получаем значение выбранного направления
$direction = $_POST['direction'];

// Получаем программы, связанные с выбранным направлением
$program_options = '';
foreach ($programs[$direction] as $program) {
$program_options .= '<option value="' . $program . '">' . $program . '</option>';
}

// Выводим форму регистрации с выбором направления и программы


echo '<label for="program">Выберите программу:</label>';
echo '<select name="program">';
echo $program_options;
echo '</select>';

echo '<input type="submit" value="Зарегистрироваться">';
echo '</form>';
?>

<p> Курс </p>
            <select class="kyrs">
              <option value="1">Программирование роботов</option>
              <option value="2">Основы программирования на Java</option>
              <option value="3">Программирование на Python</option>
              <option value="4">Мобильная разработка</option>
              <option value="5">Разработка VR/AR – приложений</option>
              <option value="6">Основы алгоритмики и логики</option>
            </select>



  
<select name="direction" id="direction">
<?php
// Создаем опции для выпадающего списка на основе возрастных рамок
if ($age >= 9 && $age <= 12) {
echo '<option value="engineering">Инженерное дело</option>';
}
if ($age > 12 && $age <= 18) {
echo '<option value="biology">Биология</option>';
}
?>
</select>