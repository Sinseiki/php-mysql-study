        <?php
            require_once 'admin.php';
            global $conn;
            $mres = array(
                'title' => mysqli_real_escape_string($conn,$_POST['title'])
            );
            $query = "
                delete from topic 
                    where
                        title = '{$mres['title']}'
                ;
            ";
            $result = mysqli_query($conn,$query);
            if($result){
                header('Location:?');
            } else {
                echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
            }
        ?>

