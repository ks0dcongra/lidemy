<?php
  session_start();
  require_once("conn.php");
  require_once("utils.php");
  /*
  1.從 cookie 裡面讀取 PHPSESSID(token)
  2.從檔案裡面讀取session id 的內容
  3.放到$_SESSION
  */

  $username=NULL;
  if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
  }
  $result = $conn->query("select * from comments order by id desc");
  if(!$result){
    die('error'.$conn->error);
  }

  // if(!empty($_COOKIE['username'])){
  //   $username=$_COOKIE['username'];
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
  <!-- <header class="warning">
    <strong>注意!本站為測試用</strong>
  </header> -->
  <main class="board">
    <?php if(!$username){ ?>
    <div>
    <a class="board_btn" href="register.php">註冊</a>
    <a class="board_btn" href="login.php">登入</a>
    </div>
    <?php } else{ ?>
    <a class="board_btn" href="logout.php">登出</a> 
    <h3>你好!
      <!-- <?php echo $username; ?> -->
      <?php
      $name = $_GET['name'] ?? '';
      echo  $name;
      ?>
    </h3>
    <?php } ?>
    
    <h1 class="board_title">Comments</h1>
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
    <form class="board_new-comment-form" method="POST" action="handle_add_comments.php">
      <textarea name="content" rows="5"></textarea>
      <?php if($username){ ?>
      <input class="board_submit_btn" type="submit">
    </form>
    <?php } else{ ?>
      <h3>請登入發佈留言</h3>
    <?php } ?>
    <div class="board_hr"></div>
    <section>
    <?php 
      while($row = $result->fetch_assoc()){
    ?>
      <div class="card">
        <div class="card_avatar">
        </div>
        <div class="card_body">
          <div class="_info">
            <span class="card_author">
              <?php echo $row['nickname'];?>
            </span>
            <span class="card_time">
              <?php echo $row['created_at'];?>
            </span>
          </div>
          <div class="card_content">
            <p><?php echo $row['content'];?></p>
          </div>
        </div>
      </div> 
      <?php }?>
    </section>
  </main>
</body>
</html>