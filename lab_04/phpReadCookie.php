<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading Cookies</title>
</head>
<body>
    <?php
    if(isset($_COOKIE["Myname"])) {
        echo "<h3> Welcome " .$_COOKIE["Myname"]. "</h3>"; 
    }
    else {
        echo "<h3> Welcome Guest </h3>";
    }
    ?>
</body>
</html>