<?php
  require_once("./conn.php");
  $id = $_GET['id'];
  $sql = "SELECT * FROM categories WHERE id =".$id;
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

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
  <h1>編輯分類</h1>
  <form method='POST' action="handle_update_category.php">
 
    名稱:<input type='text' name='name' value="<?php echo $row['name']; ?>">
    <input type="hidden" name='id' value="
<?php echo $row['id']; ?>"/>
    <input type='submit'/>

  </form>
</div>
</body>
</html>
