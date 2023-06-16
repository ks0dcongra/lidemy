<?php

  if (empty($_GET['name']) || empty($_GET['age'])) {
    echo '資料有缺，請再次填寫<br>';
    exit();
  }

  echo "Hello! " . $_GET['name']  . " <br>";
  echo "Your age is " . $_GET['age'] . " <br>";

  print_r($_GET);
?>

