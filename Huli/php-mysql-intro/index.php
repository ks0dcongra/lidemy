<?php
require_once('conn.php');

  $result = $conn->query("SELECT * FROM users ORDER BY id ASC;");
  if (!$result) {
    die($conn->error);
  }

  while ($row = $result->fetch_assoc()) {
    echo "id:" . $row['id'];
    echo " <a href='delete.php?id=". $row['id'] ."'>刪除</a>";
    echo '<br>';
    echo "username:" . $row['username'] . '<br>';
  }
?>

<h2>新增 user</h2>
<form method="POST" action="add.php">
  username: <input name="username" />
  <input type="submit" /> 
</form>

<h2>編輯 user</h2>
<form method="POST" action="update.php">
  id: <input name="id" />
  username: <input name="username" />
  <input type="submit" /> 
</form>