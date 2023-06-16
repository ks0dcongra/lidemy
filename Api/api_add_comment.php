<?php 
require_once('conn.php');
header('Content-Type: application/json; charset=utf-8');

if(
  empty($_POST['content'])
){
  $json = array(
    "ok" => false,
    "message" => "Please input content"
  );
  $response = json_encode($json);
  echo $response;
  die();
}

// $user = getUserFromUsername($_SESSION['username']);
// $nickname = $user['nickname'];
$username = $_POST['username'];
$content = $_POST['content'];

// $sql = "insert into lidemy(username) values('".$username."')";
// $sql = sprintf(
//   "insert into comments(nickname, content) 
//   values('%s','%s')",$nickname,$content
// );
$sql ="insert into comments(username, content) 
  values(?,?)";
$stmt= $conn->prepare($sql);
$stmt->bind_param('ss',$username,$content);
$result = $stmt->execute();
if(!$result){
  $json = array(
    "ok" => false,
    "message" =>$conn->error
  );
  $response = json_encode($json);
  echo $response;
  die();
}

$json = array(
  "ok" => true,
  "message" => "Success!"
);
$response = json_encode($json);
echo $response;
?>
