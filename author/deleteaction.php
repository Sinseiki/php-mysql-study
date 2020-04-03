<?php
    require_once '../crud/admin.php';
    $mres = array(
        'id' => mysqli_real_escape_string($conn,$_POST['id']),
    );
    $query = "
            delete from topic
                where author_id = {$mres['id']}
        ;
    ";
    mysqli_query($conn,$query);
    $query = "
            delete from author
                where id = {$mres['id']}
        ;
    ";
    $result = mysqli_query($conn,$query);
    if($result){
        header("Location:author.php?id=".$mres['id']);
    } else {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    }
?>