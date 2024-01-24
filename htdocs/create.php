<?php
if (isset($_POST["surname"]) && isset($_POST["Names"])) {
      
    $conn = new mysqli("127.0.0.1", "root", "", "oleg");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["surname"]);
    $age = $conn->real_escape_string($_POST["Names"]);
    $sql = "INSERT INTO Учасники (surname, Names) VALUES ('$name', $age)";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>