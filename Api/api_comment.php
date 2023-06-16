<?php 
    require_once("conn.php");

    $page = 1;
    if(!empty($_GET['page'])){
      $page = intval($_GET['page']); //轉成數字
    }
    $items_per_page = 5;
    $offset = ($page - 1) * $items_per_page;

    $stmt = $conn->prepare(
        'select '.
        'C.id as id, C.content as content, '.
        'C.created_at as created_at, M.nickname as nickname, M.username as username '.
        'from comments as C '. 
        'left join member as M on C.username = M.username '. 
        'where C.is_delete is NULL '.
        'order by C.id desc '.
        'limit ? offset ?'
      );
      $stmt->bind_param('ii',$items_per_page,$offset);
      $result = $stmt->execute();
      if(!$result){
        die('error'.$conn->error);
      }
      $result = $stmt->get_result();

   $comments=array();
   while($row = $result->fetch_assoc()){
    array_push($comments,array(
        "id" => $row['id'],
        "username" => $row['username'],
        "nickname" => $row['nickname'],
        "content" => $row['content'],
        "created_at" => $row['created_at']
    ));
   }
   
   $json = array(
       "comments" => $comments
   );
   $response = json_encode($json);
   header('Content-Type: application/json; charset=utf-8');
   echo $response;
?>

