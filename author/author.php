<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <?php
        require_once('../print.php');
    ?>
    <style>
        table{margin:50px 0;border:1px ridge #777;}
        th,td{border:1px ridge #777;}
    </style>
</head>
<body>
    <h1><a href="../">WEB</a></h1>
    <a href="../">See topics</a>
    <table>
        <thead>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Profile</th>
                <th colspan="2">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
                authorList();
            ?>
        </tbody>
    </table>
    <h3>Author Sign Up</h3>
    <?php
        authorForm();
    ?>
</body>
</html>