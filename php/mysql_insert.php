<?php
    $conn=mysqli_connect('127.0.0.1','root','0000','opentutorials');
    $query='
        insert into topic (
            title,
            description,
            created
        ) values (
            "MySQL PHP",
            "MySQL PHP is ...",
            now()
        );';

    $result = mysqli_query($conn,$query);
    if(!$result){
        echo mysqli_error($conn);
    }
?>