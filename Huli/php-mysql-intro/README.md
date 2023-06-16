# 常見指令

備註：底下 query 其實有些問題，在課程後半段會再來修正這一塊

## 連線資料庫

``` php
<?php
  // 連線資料庫
  $server_name = 'localhost';
  $username = 'huli';
  $password = 'huli';
  $db_name = 'huli';

  $conn = new mysqli($server_name, $username, $password, $db_name);

  if ($conn->connect_error) {
    die('資料庫連線錯誤:' . $conn->connect_error);
  }

  $conn->query('SET NAMES UTF8');
  $conn->query('SET time_zone = "+8:00"');
?>
```

## 新增資料

``` php
<?php
  $username = $_POST['username'];
  $sql = sprintf(
    "insert into users(username) values('%s')",
    $username
  );
  $result = $conn->query($sql);
  if (!$result) {
    die($conn->error);
  }
?>
```


## 讀取資料

``` php
<?php
  $result = $conn->query("SELECT * FROM users ORDER BY id ASC;");
  if (!$result) {
    die($conn->error);
  }

  while ($row = $result->fetch_assoc()) {
    echo "id:" . $row['id'];
  }
?>
```

## 修改資料

``` php
<?php
  $id = $_POST['id'];
  $username = $_POST['username'];
  $sql = sprintf(
    "update users set username='%s' where id=%d",
    $username,
    $id
  );
  echo $sql . '<br>';
  $result = $conn->query($sql);
  if (!$result) {
    die($conn->error);
  }
?>
```

## 刪除資料

``` php
<?php
  $id = $_GET['id'];
  $sql = sprintf(
    "delete from users where id = %d",
    $id
  );
  $result = $conn->query($sql);
  if (!$result) {
    die($conn->error);
  }

  if ($conn->affected_rows >= 1) {
    echo '刪除成功';
  } else {
    echo '查無資料';
  }
?>
```


