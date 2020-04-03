<?php
    require_once '../crud/admin.php';
    $mres = array(
        'id' => mysqli_real_escape_string($conn,$_POST['id']),
        'name' => mysqli_real_escape_string($conn,$_POST['name']),
        'profile' => mysqli_real_escape_string($conn,$_POST['profile'])
    );
    $query = "
        update author
            set
                name = '{$mres['name']}',
                profile = '{$mres['profile']}'
            where
                id = {$mres['id']}
        ;
    ";
    $result = mysqli_query($conn,$query);
    if($result){
        header("Location:author.php?id=".$mres['id']);
    } else {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    }
?>