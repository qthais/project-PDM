<?php
    if(isset($_POST)){
        $data=file_get_contents("php://input");
        $user= json_decode($data,true);
        $name = $user['name'];
        $comment = $user['comment'];
        echo json_encode($user);
        // echo "Your Name is ".$name." and your comment is ".$comment;
    }
?>