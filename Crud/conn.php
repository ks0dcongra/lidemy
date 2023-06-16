<?php

$servername = 'localhost';
$username = 'shehome';
$password = '56564992';
$db_name = 'shehome';

$conn = new mysqli($servername, $username,$password,$db_name );

if(!empty($conn->connect_error)){
  die( '資料庫連線錯誤:' . $conn->connect_error);
}

$conn->query('SET NAMES UTF8');
$conn->query('SET time_zone = "+8:00"');

 ?>
