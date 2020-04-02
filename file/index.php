<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <?php
      require_once('print.php')
    ?>
    <style>
      form{display:inline};
    </style>
</head>
<body>
    <h1><a href="?">WEB</a></h1>
    <ol>
        <?php
          listModule();
        ?>
    </ol>
    <form action="?" method="POST">
      <input type="submit" name="mode" value="create">
    </form>
    <?php 
        modeBtnModule()
    ?>
    <h2>
      <?php
        titleModule();
      ?>
    </h2>
    <p>
      <?php
        contentModule();
      ?>
    </p>
</body>
</html>