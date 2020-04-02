<?php
  require_once 'crud/admin.php';
  function listModule(){
    $query = 'select * from topic';
    global $conn;
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
      $hsc = array(
        'title' => htmlspecialchars($row['title'])
      );
      echo "<li><a href=\"?title={$hsc['title']}\">{$hsc['title']}</a></li>";
    };
  };
  function titleModule(){
    if(isset($_REQUEST['mode'])){
      echo htmlspecialchars($_REQUEST['mode']);
    } else if(isset($_REQUEST['title'])){
      global $conn;
      $mresTitle = mysqli_real_escape_string($conn,$_REQUEST['title']);
      $query = "select * from topic where title='$mresTitle'";
      $result = mysqli_query($conn,$query);
      echo htmlspecialchars(mysqli_fetch_array($result)['title']);
    } else {
      echo 'Welcome';
    };  
  };
  function contentModule(){
    if(isset($_REQUEST['mode'])){
    include ('crud/'.$_REQUEST['mode'].'.php');
    } else if(isset($_REQUEST['title'])){
      global $conn;
      $mresTitle = mysqli_real_escape_string($conn,$_REQUEST['title']);
      $query = "select * from topic left join author on topic.author_id = author.id where title='$mresTitle'";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_array($result);
      echo nl2br(htmlspecialchars($row[2]));
      ?>
        </p><p>Written by <?=htmlspecialchars($row['name'])?></p>
      <?php
    } else {
      echo 'You are Welcome';
    }  
  };
  function modeBtnModule(){
    if(isset($_REQUEST['title'])){
      ?>
        <form action="?" method="POST">
          <input type="hidden" name="title" value="<?=htmlspecialchars($_REQUEST['title'])?>">
          <input type="submit" name="mode" value="update" />
        </form>
        <form action="?" method="POST" onsubmit="return confirm('really delete?')">
          <input type="hidden" name="title" value="<?=htmlspecialchars($_REQUEST['title'])?>">
          <input type="submit" name="mode" value="delete" />
        </form>
      <?php
    }
  } 
  function authorList(){
    global $conn;
    $query = "select * from author;";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
        $hsc = array(
            htmlspecialchars($row[0]),
            htmlspecialchars($row[1]),
            htmlspecialchars($row[2]),
        )
    ?>
    <tr>
        <td><?= $hsc[0] ?></td>
        <td><?= $hsc[1] ?></td>
        <td><?= $hsc[2] ?></td>
        <td>
          <form action="?id=<?=$hsc[0]?>" method="post">
            <input type='button' name='update' value='update' />
          </form>
        </td>
        <td>
          <form action="?id=<?=$hsc[0]?>" method="post">
            <input type='button' name='delete' value='delete' />
          </form>  
        </td>
    <tr>
    <?php
    }
  }
  function authorForm(){
    ?>
    <form action="createaction.php" method="post">
      <input type="text" placeholder="Name" name="name" /><br />
      <textarea name="profile" cols="21" placeholder="Profile"></textarea><br />
      <input type="submit" value="Sign Up Author" />
    </form>
    <?php
  }
?>