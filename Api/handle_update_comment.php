<?php 
session_start();
require_once('conn.php');
require_once("utils.php");

if(
empty($_POST['content'])
){
  header("Location: 
  update_comment.php?errCode=1&id=".$_POST['id']);
  die('資料不齊全');
}

$username = $_SESSION['username'];
$id = $_POST['id'];
$content = $_POST['content'];
// $nickname = $_POST['nickname'];
// $sql = "insert into lidemy(username) values('".$username."')";

// $sql = sprintf(
//   "insert into comments(nickname, content) 
//   values('%s','%s')",$nickname,$content
// );

$sql ="update comments set content=? where 
id=? and username=?";
$stmt= $conn->prepare($sql);
$stmt->bind_param('sis',$content,$id,$username);
$result = $stmt->execute();
if(!$result){
  die($conn->error);
}
header("Location: index.php");
?>
