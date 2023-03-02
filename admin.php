<?php
    $prob = [];
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["sub"])){
        $topic = strip_tags($_POST["top"]);
        $cont = strip_tags($_POST["cont"]);
        $photo = $_FILES["name"];
        $type = $_FILES["type"];
        $tmp = $_FILES["tmp_name"];
        $size = $_FILES["size"];
    }else{
        $prob[] = "SOMETHING WEN'T WRONG";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <h1>Welcome to blog admin page</h1>
    </nav>
    <div class="formdiv">
        <form action="" method="post">
            <input type="file"><br>
            <input type="text" name="top"><br>
            <!-- <input type="text" name="cont"><br> -->
            <textarea name="cont" id="" cols="30" rows="10"></textarea><br>
            <button type="submit">submit</button>
        </form>
    </div>
</body>
</html>