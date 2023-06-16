<?php /*用來跟handale_login.php做替換，一個是用session一個是用cookie*/ 
session_start();
require_once("../utils.php");
require_once("../model/members.php");
if(
  empty($_POST['username'])||
  empty($_POST['password']))
{
  header("Location: ../view/login.php?errCode=1");
  die('資料不齊全');
}

$username = $_POST['username'];
$password = $_POST['password'];

// $sql = "insert into lidemy(username) values('".$username."')";

// $sql = sprintf(
//   "select * from member where username='%s'"
//   ,$username
// );
$result = get_member($username);

// $result = $conn->query($sql);
// if(!$result){
//   die($conn->error);
// }

// if($result->num_rows == 0){
//   header("Location:./login.php?errCode=2");
//   exit();
// }

//有查到使用者
$row = $result->fetch_assoc();?>
<script>
 var hi  = <?php echo $row?>; 
 console.log(hi);

</script>
<?php
if(password_verify($password, $row['password'])){

//   //登入成功
//   /*
//   1. 產生SESSION ID(token)
//   2. 把username 寫入檔案
//   3. set-cookie:session-id
//   */
  $_SESSION['username'] = $username;
  header("Location:../index.php");
}
else{
  header("Location:../view/login.php?errCode=2");
}
?>

