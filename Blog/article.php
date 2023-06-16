<?php
  require_once("./conn.php");
  $id = $_GET['id'];
  $sql = "SELECT A.title,A.id, A.content, A.content,C.name FROM articles as A
   LEFT JOIN categories as C ON A.category_id=
   C.id WHERE A.id=". $id;
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $title=$row['title'];
  $content=$row['content'];
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
    <a href="http://localhost/lidemy/BLOG/index.php">首頁</a>
    <a href="http://localhost/lidemy/BLOG/about.php">關於我</a>
    <a class="active"href="http://localhost/lidemy/BLOG/article.php">文章列表</a>
  </nav>
  <div class="container">
      <div class="single-article">
        <h1><?php echo $row['title'] ?></h1>
        <h2>分類:<?php echo $row['name']?></h2>
        <p><?php echo $content ?></p>
      </div>
  </div>
</body>
</html>
