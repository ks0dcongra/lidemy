<?php
require_once("conn.php");
$name = $_POST['name'];
$id = $_POST['id'];

if(empty($name)){
    die('empty data');
}
else{
    echo('hi');
}
$sql = "UPDATE categories SET name='$name' WHERE id=" . $id;
$result = $conn->query($sql);
if($result){
    header('Location: admin_category.php');
}else{
    die("failed".$conn->error);
}

?>