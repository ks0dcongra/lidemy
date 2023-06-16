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
    <h1 >Job board 職缺報報-新增職缺</h1>
    <a href="./admin.php">回到管理頁</a>
  <form method="post"  action="./handle_add.php">
    <div>職缺名稱:<input name='title'/></div>
    <div>職缺描述:<textarea name='discription'></textarea></div>
    <div>薪水範圍:<input name='salary'/></div>
    <div>職缺連結:<input name='link'/></div>
    <div><input type='submit' value='送出'></input></div>
  </form>

</div>
</body>
</html>
