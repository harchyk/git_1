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

<!doctype html>
<html lang="en">
<script>
  var kol_result = 2;
  var add_Test_ID;

  function add_test() {
    var Name = document.getElementById("exampleInputEmail1");
    $.ajax({
        method: "POST",
        url: "func_add_test.php",
        data: {
          text: Name.value
        }
      })
      .done(function(response) {
        $("p.broken").html(response);

        $('#Name_test').remove();

        add_Test_ID = response;
        $('<div id="result" class="form-group"><div id="result2" class="form-group"></div></div>').insertAfter('#Home');
        $('<label for="exampleInputEmail1">Результат теста</label>').insertBefore('#result2');
        $('<input id="Result0" type="text" class="form-control" id="exampleInputEmail1" placeholder="Результат теста">').insertBefore('#result2');
        $('<label for="exampleInputEmail1">Результат теста</label>').insertBefore('#result2');
        $('<input id="Result1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Результат теста">').insertBefore('#result2');
        $('<button id="add_result" type="submit" style="margin-top: 5px;" onclick="add_result()" class="btn btn-outline-primary">Добавить ответы на тест</button>').insertBefore('#result2');
        $('<button type="submit" style="margin-top: 5px;" onclick="add_varius_result()" class="btn btn-outline-primary">Добавить варианты ответа</button>').insertBefore('#result2');

      });
  }

  function add_varius_result() {
    $('<label for="exampleInputEmail1">Результат теста</label>').insertBefore('#add_result');
    $('<input id="Result' + kol_result + '" type="text" class="form-control" id="exampleInputEmail1" placeholder="Результат теста">').insertBefore('#add_result');
    kol_result++;
  }

  function add_varius_aw() {
    $('<label for="exampleInputEmail1">Вопрос</label>').insertBefore('#add_result');
    $('<input id="Result' + kol_result + '" type="text" class="form-control" id="exampleInputEmail1" placeholder="Вопрос">').insertBefore('#add_result');
    kol_result++;
  }

  function add_result() {
    for (var i = 0; i < kol_result; i++) {
      var Name = document.getElementById("Result" + i);
      $.ajax({
          method: "POST",
          url: "func_add_result.php",
          data: {
            testID: add_Test_ID,
            text: Name.value
          }
        })
        .done(function(response) {
          alert(response);
        });
    }
    kol_result = 1;
    $('#result').remove();
    $('<div id="result" class="form-group"><div id="result2" class="form-group"></div></div>').insertAfter('#Home');
    $('<label for="exampleInputEmail1">Вопрос</label>').insertBefore('#result2');
    $('<input id="Result0" type="text" class="form-control" id="exampleInputEmail1" placeholder="Вопрос">').insertBefore('#result2');
    $('<button id="add_result" type="submit" style="margin-top: 5px;" onclick="add_result2()" class="btn btn-outline-primary">Добавить Вопросы на тест</button>').insertBefore('#result2');
    $('<button type="submit" style="margin-top: 5px;" onclick="add_varius_aw()" class="btn btn-outline-primary">Добавить вопрос</button>').insertBefore('#result2');

  }

  function add_result2() {
    for (var i = 0; i < kol_result; i++) {
      var Name = document.getElementById("Result" + i);
      $.ajax({
          method: "POST",
          url: "func_add_question.php",
          data: {
            testID: add_Test_ID,
            text: Name.value
          }
        })
        .done(function(response) {
          alert(response);
        });
    }
  }
</script>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Тестирование</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>

  <div class="container">
    <div id="Home" class="row py-5">
      <div class="" style="width: 100%;display: inline-block;">

        <?php if ($user) { ?>

          <h1 style="float: left;" onclick="pageUpdate('log.php')">Добро пожаловать обратно, <?= htmlspecialchars($user['username']) ?>!</h1>

          <form class="" method="post" style="margin-bottom: 58px;" action="do_logout.php">
            <button type="submit" style="float: right;" class="btn btn-primary">Logout</button>
          </form>


          <div id="Name_test" class="form-group">
            <label for="exampleInputEmail1">Название теста</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Название теста">


            <button type="submit" style="margin-top: 5px;" onclick="add_test()" class="btn btn-outline-primary">Добавить</button>
          </div>
      </div>
    </div>


  <?php } else { ?>

    <h1 class="mb-5">Авторизация</h1>

    <?php flash(); ?>

    <form method="post" action="do_login.php">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Login</button>

      </div>
    </form>

  <?php } ?>


  </div>
  </div>

</body>

</html>