<?php
  require_once('./conn.php');
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
<div class="container">
  <h1>Job board 職缺報報管理後臺</h1>
  <a href="add.php">新增職缺</a>
  <div class="jobs">
    <?php
      $sql = 'SELECT * FROM jobs ORDER BY created_at DESC';
      $result = $conn->query($sql);
      if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
          echo "<div class='job'>";
          echo "<h2 class='job_title'>".$row['title']."</h2>";
          echo "<h2 class='job_discription'>".$row['discription']."</h2>";
          echo "<h2 class='job_salary'>薪水範圍: ".$row['salary']."</h2>";
          echo "<a class='job_link' href='https://google.com'>".$row['link']."<br><br></a>";
          echo "<a class='job_link' href='./update.php?id=".$row['id']
          ."'>編輯職缺</a>";
          echo "<a class='job_link' href='./delete.php?id=".$row['id']
          ."'>刪除職缺</a>";
          echo "</div>";
        }
      }
    ?>
    <!-- <div class="job">
      <h2 class="job_title">前端工程師</h2>
      <p class="job_discription">前端工程師的描述</p>
      <p class="job_salary">薪資範圍:面議</p>
      <a class="job_link" href="https://google.com">更多資訊</a>
    </div>
    <div class="job">
      <h2 class="job_title">前端工程師</h2>
      <p class="job_discription">前端工程師的描述</p>
      <p class="job_salary">薪資範圍:面議</p>
      <a class="job_link" href="https://google.com">更多資訊</a>
    </div> -->

  </div>

</div>
</body>
</html>
