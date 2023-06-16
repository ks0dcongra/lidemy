<?php
  require_once('conn.php');

   $title = $_POST['title'];
   $discription = $_POST['discription'];
   $salary = $_POST['salary'];
   $link = $_POST['link'];
 
   if(empty($title) ||empty($discription) ||
   empty($salary) || empty($link)){
     die('請檢查資料');
   }
  

  $sql = "INSERT INTO jobs(title,discription,salary,link)
  VALUES('$title','$discription','$salary','$link')";
  $result = $conn->query($sql);
 


  if($result){
    header('Location:./admin.php');
  }
  else{
    echo "failed".$conn->error;
  }
?>
