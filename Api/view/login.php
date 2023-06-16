<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>留言板-註冊頁面</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="board">
    <div>
    <a class="board_btn" href="../index.php">回留言板</a>
    <a class="board_btn" href="../register.php">註冊</a>
    </div>
    <h1 class="board_title">登入</h1>
    <?php
      if(!empty($_GET['errCode'])){
        $code = $_GET['errCode'];
        $msg='Error';
        if($code==1){
          $msg = '資料不齊全';
        }
        else if($code==2){
          $msg = '帳號或密碼輸入錯誤';
        }
        echo '<h2 class="error">錯誤:'.$msg.'</h2>';
      }
    ?>
    <form class="board_new-comment-form" method="POST" action="../controler/handle_login_session.php">
      <div class="board_nickname">
        <span>帳號:</span>
        <input type="text" name="username">
      </div>
      <div class="board_nickname">
        <span>密碼:</span>
        <input type="password" name="password">
      </div>
      <input class="board_submit_btn" type="submit">
    </form>
  </main>
</body>
</html>