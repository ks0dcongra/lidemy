<?php
  require_once("./conn.php");
  $id = $_GET['id'];
  $sql = "SELECT * FROM jobs WHERE id =".$id;
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Jobs</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="jobs.css">
</head>

<body>
  <div class = "container">
    <h1 >Job board 職缺報報-編輯職缺</h1>
    <a href="./admin.php">回到管理頁</a>
  <form method="post"  action="./handle_update.php">
    <div>職缺名稱:<input name='title' value="
<?php echo $row['title'] ?>">
  </div>
    <div>職缺描述:<textarea name='discription' rows='10'>
<?php echo $row['discription'] ?></textarea></div>
    <div>薪水範圍:<input name='salary'value="
<?php echo $row['salary'] ?>"></div>
    <div>職缺連結:<input name='link'value="
<?php echo $row['link'] ?>"></div>
  <div><input type="hidden" name="id" value="
<?php echo $row['id'] ?>"></div>
    <div><input type='submit' value='送出'></input></div>
  </form>

</div>
</body>
</html>
