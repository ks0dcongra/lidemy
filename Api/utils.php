<?php 
require_once("conn.php");
function generateToken(){
    $s ='';
    for($i=1;$i<=16;$i++){
      $s .= chr(rand(65,90));
    }
    return $s;
  }  
  
  function getUserFromUsername($username){
      global $conn; //function 宣告需要global.  
      $sql = sprintf(
        "select * from member where username = '%s'",
        $username
      );
      $result = $conn->query($sql);
      $row=$result->fetch_assoc();
      return $row; //username nickname id



    }

    function escape($str) {
      return htmlspecialchars($str, ENT_QUOTES);
    }


?>

