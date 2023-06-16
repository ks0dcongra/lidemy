<?php

require_once('conn.php');

$result = $conn->query("select * from lidemy order by id ASC;");
if(!$result){
  die($conn->error);
}
// print_r($result);


while($row = $result->fetch_assoc()){
  echo "id:" .$row['id'] .'<br>';
  echo "<a href='delete.php?id=".$row['id']."'>刪除</a>";
  echo "username:" .$row['username'].'<br>';

}

?>
<h2>新增username</h2>
<form   method="POST" action="add.php">
  username: <input name='username' />
  <input type="submit"/>
</form>

<h2>編輯username</h2>
<form   method="POST" action="update.php">
  id: <input name='id' />
  username: <input name='username' />
  <input type="submit"/>
</form>
