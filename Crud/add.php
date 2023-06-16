<?php //SQL插入資料
require_once('conn.php');

if(empty($_POST['username'])) {
  die('請輸入 username!');
}
$username = $_POST['username'];
// $sql = "insert into lidemy(username) values('".$username."')";
$sql = sprintf(
  "insert into lidemy(username) values('%s')",$username
);

$result = $conn->query($sql);
if(!$result){
  die($conn->error);
}

echo "新增成功!";

header("Location: index.php");
?>
