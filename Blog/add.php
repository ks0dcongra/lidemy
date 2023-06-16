<?php
  require_once('./conn.php');
  $sql = "SELECT * FROM categories ORDER BY created_at DESC";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog 部落格</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="blog.css">
</head>

<body>
<div class="container">
  <h1>新增文章</h1>
  <form method='POST' action="handle_add.php">
    <div>標題:<input type='text' name='title'/></div>
    <div>內容:<textarea type='text' name='content'></textarea></div>
    <div>
      分類:<select name="category_id">
      <?php
        while($row = $result->fetch_assoc()){
          $id = $row['id'];
          echo '$id';
          $name = $row['name'];
          echo "<option value='$id'>$name</option>";
        }
      ?>
      </select>
    </div>
    <input type='submit'/>

  </form>
</div>
</body>
</html>
