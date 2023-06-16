<?php 
require_once('conn.php');
require_once("utils.php");

if(
empty($_POST['content'])
){
  header("Location: index.php?errCode=1");
  die('資料不齊全');
}

$user = getUserFromToken($_COOKIE['token']);
$nickname = $user['nickname'];

$content = $_POST['content'];
// $sql = "insert into lidemy(username) values('".$username."')";
$sql = sprintf(
  "insert into comments(nickname, content) 
  values('%s','%s')",$nickname,$content
);

$result = $conn->query($sql);
if(!$result){
  die($conn->error);
}
header("Location: index.php");
?>
