<h3><?=$_POST['id'] ?></h3>
<form action="crud/updateaction.php" method="post">
    <input type="hidden" name="old_title" value="<?= $_POST['id']; ?>">
    <input type="text" name="title" placeholder="title" value="<?= $_POST['id']; ?>"/><br />
    <textarea name="contents" placeholder="contents" rows="8" cols="50"><?= file_get_contents('data/'.$_POST['id']); ?></textarea>
    <input type="submit" />
</form>