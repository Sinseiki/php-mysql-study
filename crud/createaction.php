<?php
    require_once 'admin.php';
    $mres = array(
        'title' => mysqli_real_escape_string($conn,$_POST['title']),
        'contents' => mysqli_real_escape_string($conn,$_POST['contents']),
        'author_id' => mysqli_real_escape_string($conn,$_POST['author_id'])
    );
    $query = "
        insert into topic (
            title, description, created, author_id
        ) values (
            '{$mres['title']}', '{$mres['contents']}', now(), '{$mres['author_id']}'
        );
    ";
    $result = mysqli_query($conn,$query);
    if($result){
        header('Location:../?id='.$_POST['title']);
    } else {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    }
?>