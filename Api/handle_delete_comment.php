<?php 
session_start();
require_once('conn.php');
require_once("utils.php");

if(empty($_GET['id']))
{
  header("Location: index.php?errCode=1");
  die('資料不齊全');
}


$id = $_GET['id'];
$username = $_SESSION['username'];

// $sql = "insert into lidemy(username) values('".$username."')";
// $sql = sprintf(
//   "insert into comments(nickname, content) 
//   values('%s','%s')",$nickname,$content
// );

// $sql ="delete from comments where id=?"; //最原始的刪法

$sql ="update comments set 
is_delete=1 where id=? and username=?";
$stmt= $conn->prepare($sql);
$stmt->bind_param('is',$id,$username);
$result = $stmt->execute();
if(!$result){
  die($conn->error);
}
header("Location: index.php");
?>
