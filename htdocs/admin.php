<!DOCTYPE html>
<html>
<head>
<title>METANIT.COM</title>
<meta charset="utf-8" />
</head>
<body>
<h2>Список Заявок</h2>
<?php
$conn = new mysqli("127.0.0.1", "root", "", "oleg");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM oleg";
if($result = mysqli_query($conn, $sql))
{
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Почта</th><th>Номер</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>", "<input type=checkbox>" ,"</td>" ;
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["pochta"] . "</td>";
            echo "<td>" . $row["numer_fene"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
} 
else
{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
<h2>Список Пользователей</h2>
<?php
$conn = new mysqli("127.0.0.1", "root", "", "oleg");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM users Order by username";
if($result = mysqli_query($conn, $sql))
{
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    echo "<p>Получено объектов: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Логин</th><th></th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>", "<input type=checkbox>" ,"</td>" ;
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
           
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
} 
else
{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
</body>
</html>