<?php
    require_once 'admin.php';
    global $conn;
    $mresId = mysqli_real_escape_string($conn,$_REQUEST['title']);
    $query = "select * from topic where title='$mresId'";
    $result = mysqli_query($conn,$query);
    $hsc_contents = htmlspecialchars(mysqli_fetch_array($result)[2]);
?>
<h3><?=htmlspecialchars($_POST['title']) ?></h3>
<form action="crud/updateaction.php" method="post">
    <input type="hidden" name="old_title" value="<?= htmlspecialchars($_POST['title']); ?>">
    <input type="text" name="title" placeholder="title" value="<?= htmlspecialchars($_POST['title']); ?>"/><br />
    <textarea name="contents" placeholder="contents" rows="8" cols="50"><?= $hsc_contents; ?></textarea>
    <input type="submit" />
</form>