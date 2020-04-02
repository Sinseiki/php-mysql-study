<?php
    require_once 'admin.php';
    $mres = array(
        'title' => mysqli_real_escape_string($conn,$_POST['title']),
        'contents' => mysqli_real_escape_string($conn,$_POST['contents']),
        'old_title' => mysqli_real_escape_string($conn,$_POST['old_title'])
    );
    $query = "
        update topic 
            set
                title = '{$mres['title']}',
                description = '{$mres['contents']}'
            where
                title = '{$mres['old_title']}'
    ";
    $result = mysqli_query($conn,$query);
    if($result){
        header('Location:../?id='.$_POST['title']);
    } else {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    }
?>