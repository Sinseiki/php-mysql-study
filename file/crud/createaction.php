<?php
    file_put_contents('../data/'.$_POST['title'],$_POST['contents']);
    header('Location:../?id='.$_POST['title']);
?>