<?php
    $file = fopen("../private/content.txt","r");
    while(!feof($file)){
        $lin = fgets($file);
        $line = explode("|",$lin);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="assets/dist/blog.css"> -->
    <link rel="stylesheet" href="dist/blog.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="#" class="logo">caveman's blog</a>
        <ul>
            <li><a href="#">sport news</a></li>
            <li><a href="#">educational news</a></li>
            <li><a href="#">contact us</a></li>
        </ul>
    </nav>
</body>
</html>