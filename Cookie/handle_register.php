<?php //SQL插入資料
require_once('conn.php');
if(
empty($_POST['nickname'])||
empty($_POST['password'])||
empty($_POST['username']))
{
  header("Location: ./register.php?errCode=1");
  die('資料不齊全');
}
$nickname = $_POST['nickname'];
$username = $_POST['username'];
$password = $_POST['password'];
// $sql = "insert into lidemy(username) values('".$username."')";
$sql = sprintf(
  "insert into member(nickname, username, password) 
  values('%s','%s','%s')",$nickname,$username,$password
);

$result = $conn->query($sql);
if(!$result){
  $code=$conn->errno;
  if($code ==1062){
    header("Location: ./register.php?errCode=2");
  }
  die($conn->error);
}
header("Location: index.php");
?>
