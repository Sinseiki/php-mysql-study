<?php
    require_once '../crud/admin.php';
    $mres = array(
        'name' => mysqli_real_escape_string($conn,$_POST['name']),
        'profile' => mysqli_real_escape_string($conn,$_POST['profile'])
    );
    $query = "
        insert into author (
            name, profile
        ) values (
            '{$mres['name']}', '{$mres['profile']}'
        );
    ";
    $result = mysqli_query($conn,$query);
    if($result){
        header('Location:author.php');
    } else {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
    }
?>