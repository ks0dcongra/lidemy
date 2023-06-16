<?php
    require_once('./conn.php');
   $id = $_GET['id'];
   $sql = "DELETE FROM articles WHERE id =".$id;
   if($conn->query($sql)){
    header('Location:./admin.php');
   }else{
    // echo "failed:".$conn->error;
    die('failed');
   }
?>
