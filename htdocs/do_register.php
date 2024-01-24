<?php

require_once __DIR__.'/boot.php';

$stmt = pdo()->prepare("SELECT * FROM `oleg` WHERE `pochta` = :username");
$stmt->execute(['username' => $_POST['username']]);
if ($stmt->rowCount() > 0) {
    flash('Это имя пользователя уже занято.');
    header('Location: /');
    die;
}

$stmt = pdo()->prepare("INSERT INTO `oleg` (`pochta`, `parol`, `numer_fene`) VALUES (:username, :password, :numer_fene)");
$stmt->execute([
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'numer_fene' => $_POST['numer_fene'],
]);

header('Location: login.php');
