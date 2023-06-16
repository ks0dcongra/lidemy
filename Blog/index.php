<?php
  require_once("./conn.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Blog 部落格</title>
    <link rel='stylesheet' type="text/css" href="blog.css">
</head>

<body>
  <nav class="nav">
    <h1 >BLOG</h1>
    <a class="active" href="http://localhost/lidemy/BLOG/index.php">首頁</a>
    <a href="http://localhost/lidemy/BLOG/about.php">關於我</a>
    <a href="http://localhost/lidemy/BLOG/article.php">文章列表</a>
  </nav>
  <div class="container">
    <div class="articles">
      <?php
          $sql = "SELECT * FROM articles ORDER BY created_at DESC";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              $id=$row['id'];
              $title=$row['title'];
              echo "<div class='article'>";
              echo "<h1><a href='./article.php?id=$id'>$title</a></h1>";
              echo "</div>";
            }
          }
      ?>
    </div>
  </div>
</body>
</html>
