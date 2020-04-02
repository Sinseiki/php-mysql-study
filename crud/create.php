<?php
  require_once 'crud/admin.php';
?>
<form action="crud/createaction.php" method="post">
    <input type="text" name="title" placeholder="title" />

    <select name="author_id">
        <?php
             global $conn;
             $query = "select * from author";
             $result = mysqli_query($conn,$query);
             while($row = mysqli_fetch_array($result)){
                 ?>
                    <option value="<?= $row['id'] ?>"><?=$row['name']?></option>
                 <?php
             }
        ?>
    </select><br />

    <textarea name="contents" placeholder="contents" rows="8" cols="50"></textarea>
    <input type="submit" value="Write"/>
</form>