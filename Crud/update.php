<?php //SQL刪除資料
require_once('conn.php');

if(empty($_POST['id']) || empty($_POST['username'])) {
  die('請輸入 id 與 username');
}
$id = $_POST['id'];
$username = $_POST['username'];
// $sql = "insert into lidemy(username) values('".$username."')";
$sql = sprintf(
  "update lidemy set username='%s' where id=%d",
  $username,
  $id
);

echo $sql.'<br>';
$result = $conn->query($sql);
if(!$result){
  die($conn->error);
}

if($conn->affected_rows){
  echo "編輯成功";
}
else{
  echo "編輯失敗";
}

header("Location: index.php");
?>
