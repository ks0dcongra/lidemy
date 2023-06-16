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
  $user=NULL;
  if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
    $user=getUserFromUsername($username);
  }
  // $result = $conn->query("select * from comments order by id desc");
  // if(!$result){
  //   die('error'.$conn->error);
  // }

    $page = 1;
    if(!empty($_GET['page'])){
      $page = intval($_GET['page']); //轉成數字
    }
    $items_per_page = 5;
    $offset = ($page - 1) * $items_per_page;
    
    $stmt = $conn->prepare(
      'select '.
      'C.id as id, C.content as content, '.
      'C.created_at as created_at, M.nickname as nickname, M.username as username '.
      'from comments as C '. 
      'left join member as M on C.username = M.username '. 
      'where C.is_delete is NULL '.
      'order by C.id desc '.
      'limit ? offset ?'
    );
    $stmt->bind_param('ii',$items_per_page,$offset);
    $result = $stmt->execute();
    if(!$result){
      die('error'.$conn->error);
    }
    $result = $stmt->get_result();
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
    <?php if(!$username){ ?>
      <div>
      <a class="board_btn" href="register.php">註冊</a>
      <a class="board_btn" href="login.php">登入</a>
      </div>
      <?php } else{ ?>
      <a class="board_btn" href="logout.php">登出</a> 
      <span class="board_btn update_nickname"> 編輯暱稱</span>
      <form class="hide board_nickname-form board_new-comment-form" action="update_user.php" method="POST">
      <div class="board_nickname">
        <span>新的暱稱:</span>
        <input type="text" name="nickname">
      </div>
        <input class="board_submit_btn" type="submit" value="提交">
      </form>
      <h3>你好!<?php echo $user['nickname']; ?></h3>
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
    <form class="board_new-comment-form" method="POST" action="handle_add_comment.php">
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
        // print_r($row);
    ?>
      <div class="card">
        <div class="card_avatar">
        </div>
        <div class="card_body">
          <div class="_info">
            <span class="card_author">
              <?php echo $row['nickname'];?>
              (@<?php echo $row['username'];?>)
            </span>
            <span class="card_time">
              <?php echo $row['created_at'];?>
            </span>
            <?php if($row['username']===$username){ ?>
            <a href="update_comment.php?id=<?php echo $row['id'] ?>">編輯</a>
            <a href="handle_delete_comment.php?id=<?php echo $row['id'] ?>">刪除</a>
            <?php  } ?>
          </div>
          <div class="card_content">
            <p><?php echo $row['content'];?></p>
          </div>
        </div>
      </div> 
      <?php }?>
    </section>
    <div class="board_hr"></div>
    <?php 
        $stmt = $conn->prepare(
          "select count(id) as count from comments where is_delete is null"
        );
        $result = $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];
        $total_page = ceil($count / $items_per_page);  //ceil無條件進位
    ?>
    <div class="page-info">
      <span>總共有<?php echo $count ?>筆留言，頁數: </span>
      <span><?php echo $page ?> / <?php echo $total_page ?></span>
    </div>
    <div class="paginator">
      <?php if($page != 1){ ?>
      <a href="index.php?page=1">首頁</a>
      <a href="index.php?page=<?php echo $page - 1 ?>">上一頁</a>
      <?php } ?>
      <?php if($page != $total_page){ ?>
      <a href="index.php?page=<?php echo $page + 1 ?>">下一頁</a>
      <a href="index.php?page=<?php echo $total_page ?>">最後一頁</a>
      <?php } ?>
      

    </div>
  </main>
  <script>
    var btn = document.querySelector('.update_nickname')
    btn.addEventListener('click',function(){
      var form=document.querySelector('.board_nickname-form')
      form.classList.toggle('hide')
      console.log(form)
    })
  </script>
</body>
</html>