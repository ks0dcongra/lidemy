<?php //SQL刪除資料
require_once('conn.php');

if(empty($_GET['id'])) {
  die('請輸入 id!');
}
$id = $_GET['id'];
// $sql = "insert into lidemy(username) values('".$username."')";
$sql = sprintf(
  "delete from lidemy where id = %d",
  $id
);

echo $sql.'<br>';
$result = $conn->query($sql);
if(!$result){
  die($conn->error);
}

if($conn->affected_rows){
  echo "刪除成功";
}
else{
  echo "刪除失敗";
}

header("Location: index.php");
?>
