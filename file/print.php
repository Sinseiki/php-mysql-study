<?php
  function listModule(){
    $dirList = scandir('data');
        
    for($i=0;$i<count($dirList);$i++){
      if($dirList[$i]!=='.'&&$dirList[$i]!=='..'){
        echo "<li><a href=\"?id=$dirList[$i]\">$dirList[$i]</a></li>\n";
      }
    }
  };
  function titleModule(){
    if(isset($_REQUEST['mode'])){
      echo htmlspecialchars($_REQUEST['mode']);
    } else if(isset($_REQUEST['id'])){
      echo  htmlspecialchars(basename($_REQUEST['id']));
    } else {
      echo 'Welcome';
    };  
  };
  function contentModule(){
    if(isset($_REQUEST['mode'])){
    include ('crud/'.$_REQUEST['mode'].'.php');
    } else if(isset($_REQUEST['id'])){
      echo nl2br(htmlspecialchars(file_get_contents('data/'.basename($_REQUEST['id']))));
    } else {
      echo 'You are Welcome';
    }  
  };
  function modeBtnModule(){
    if(isset($_REQUEST['id'])){
      ?>
        <form action="?" method="POST">
          <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
          <input type="submit" name="mode" value="update" />
        </form>
        <form action="?" method="POST" onsubmit="return confirm('really delete?')">
          <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
          <input type="submit" name="mode" value="delete" />
        </form>
      <?php
    }
  } 
?>