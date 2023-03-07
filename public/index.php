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
    <link rel="stylesheet" href="assets/dist/blog.css">
    <link rel="stylesheet" href="dist/blog.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="#" class="logo">caveman's blog</a>
        <ul>
            <li><a href="#">sports</a></li>
            <li><a href="#">education</a></li>
            <li><a target="_blank" href="admin.php">contact</a></li>
        </ul>
    </nav>
    <section class="wel">
        <h1>Welcome to CAVEMAN'S BLOG <sup>So much more to read now</sup></h1>
        <p>News ,Events ,Entertainment ,Lifestyle ,Fashion ,Beauty ,Inspiration and yes.....Gossip!*wink*</p>
    </section>
    <section class="news">
        <div class="gridcontainer">
            <?php
                $gum = fopen("../private/content.txt","r");
                while(!feof($gum)){
                    $lin = fgets($gum);
                    $line = explode("|",$lin);
                    echo "<div>";
                        echo '<img src="images/' . $line[0] . '" alt="' . $line[0] . '">';
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>