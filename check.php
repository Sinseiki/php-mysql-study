<?php
  require_once 'crud/admin.php';
    $query = 'select * from topic';
    global $conn;
    $result = mysqli_query($conn,$query);
    var_dump($result);
?>