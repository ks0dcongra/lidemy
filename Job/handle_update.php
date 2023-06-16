<?php
  require_once('conn.php');

   $title = $_POST['title'];
   $discription = $_POST['discription'];
   $salary = $_POST['salary'];
   $link = $_POST['link'];
   $id = $_POST['id'];
 
   if(empty($title) ||empty($discription) ||
   empty($salary) || empty($link)){
     die('請檢查資料');
   }
  

  $sql = "UPDATE jobs SET title='$title', discription='$discription', salary='$salary', link='$link' 
  WHERE id='$id'";
  $result = $conn->query($sql);
 


  if($result){
    header('Location:./admin.php');
  }
  else{
    echo "failed".$conn->error;
  }
?>
