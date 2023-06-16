<?php
  session_start();
  require_once("conn.php");
  require_once("utils.php");

  $id = $_GET['id'];

  $username=NULL;
  $user=NULL;
  if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
    $user=getUserFromUsername($username);
  }
  // $result = $conn->query("select * from comments order by id desc");
  // if(!$result){
  //   die('error'.$conn->error);
  // }
    $stmt = $conn->prepare(
      "select * from comments where id = ?"
    );
    $stmt->bind_param("i",$id);
    $result = $stmt->execute();
    if(!$result){
      die('error'.$conn->error);
    }
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
  // if(!empty($_COOKIE['username'])){
  // $username=$_COOKIE['username'];
  // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>留言板</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header class="warning">
    <strong>注意!本站為測試用</strong>
  </header>
  <main class="board">
   
    
    <h1 class="board_title">編輯留言</h1>
    <?php
      if(!empty($_GET['errCode'])){
        $code = $_GET['errCode'];
        $msg='Error';
        if($code==1){
          $msg = '資料不齊全';
        }
        echo '<h2 class="error">錯誤:'.$msg.'</h2>';
      }
    ?>
    <form class="board_new-comment-form" method="POST" action="handle_update_comment.php">
      <textarea name="content" rows="5"><?php echo $row['content'] ?>
      </textarea>
      <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
     
      
      <input class="board_submit_btn" type="submit">
    </form>
    <div class="board_hr"></div>
  </main>
  
</body>
</html>