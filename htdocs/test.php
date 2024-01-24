<?php
session_abort();
session_start();
$TestID = $_COOKIE["testID"];
session_abort();
require_once __DIR__ . '/boot.php';

?>
<!doctype html>
<html lang="en">
<script>
  
  function fun1(name) {
    for (g = 0; g < kek.length; g++) {
      var rad = document.getElementsByName(" " + kek[g]);
      for (var i = 0; i < rad.length; i++) {
        if (rad[i].checked) {
          for (var j = 0; j < items.length; j++) {

            if (items[j][0] == rad[i].value) {
              items[j][1] = parseInt(items[j][1]) + parseInt(rad[i].id);
            }
          }
        }
      }
    }
    var max_ball = 0;
    var max_ID_result = 0;
    for (g = 0; g < items.length; g++) {
      if (items[g][1] > max_ball) {
        max_ball = items[g][1];
        max_ID_result = items[g][0];
      }
    }



    <?php

    require_once __DIR__ . '/boot.php';

    $stmt = pdo()->prepare("SELECT * FROM `result`");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
    do {
    ?>
      if (max_ID_result == <?php echo $row[0] ?>) {
        alert("<?php echo $row[2] ?>")
      }
    <?php

    } while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));
    ?>



  }
</script>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Php auth demo</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<script>
  function contains(arr, elem) {
    for (var i = 0; i < arr.length; i++) {
      if (arr[i][0] === elem) {
        return true;
      }
    }
    return false;
  }
</script>

<body>

  <div class="container">
    <div class="row py-5">
      <div class="col-lg-6">

        <h1 class="mb-5">
          <?php

          require_once __DIR__ . '/boot.php';

          $stmt = pdo()->prepare("SELECT * FROM `test` where ID = '" . $TestID . "'");
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
          do {
            $data = $row[1];
            print "<!DOCTYPE html>" . $data;
          } while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));
          ?>
        </h1>

        <h3>
          <?php
          require_once __DIR__ . '/boot.php';
          $result_arr = array(array());
          $stmt = pdo()->prepare("SELECT * FROM `question` where ID_Test = '" . $TestID . "'");
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
          ?>
          <script>
            let kek = [];

            let items = [
              []
            ];
          </script>
          <?php
          $b = array(array());

          do {
          ?>
            <script>
              kek.push(<?php echo $row[0] ?>);
            </script>
            <?php
            $data = $row[2];

            print "<h2>" . $data . "?" . "<br></h2>";

            $stmt2 = pdo()->prepare("SELECT * FROM `answer` where ID_Question = '" . $row[0] . "'");
            $stmt2->execute();
            $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $stmt2->execute();
            $row2 = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
            print_r("<FORM NAME='LAYOUTFORM' ACTION='checkbox_test.php' METHOD=POST>");
            do {

              echo var_dump(count($b));
            ?>
              <script>
                document.write(items.length);

                if (!contains(items, <?php echo $row2[3] ?>)) {
                  items.push([<?php echo $row2[3] ?>, 0])
                }
              </script>
          <?php
              $data = $row2[4];

              print "<input type='radio' id='$row2[2]' name=' $row2[1]' value='$row2[3]'>" . " <label for='contactChoice1'>" . $data . "</label><br>";
            } while ($row2 = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));

            print_r("</form>");
          } while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));

          ?>
        </h3>

        <button type="submit" style="float: right;" onclick="fun1(' 3')" class="btn btn-primary">Получить результат</button>

      </div>
    </div>
  </div>

</body>

</html>