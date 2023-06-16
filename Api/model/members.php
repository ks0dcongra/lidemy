<?php

function get_member($user)
{
    require_once('../model/conn.php');
    $sql = sprintf(
        "select * from member where username='%s'",
        $user
    );
    $result = $conn->query($sql);
    if (!$result) {
        die($conn->error);
    }

    if ($result->num_rows == 0) {
        header("Location:../view/login.php?errCode=2");
        exit();
    }
    return $result;
};


