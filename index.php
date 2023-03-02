<?php
    $prob = [];
    $err = [];
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["sub"])){
        $topic = strip_tags($_POST["top"]);
        $cont = strip_tags($_POST["cont"]);
        $FILE = $_FILES["name"];
        $type = $FILES["type"];
        $tmp = $FILES["tmp_name"];
        $size = $FILES["size"];
        $tmp = $FILES['tmp_name'];
        $ferr = $FILES["error"];

        if(empty($topic)){
            $err[] = "Topic shouldn't be empty";
        }
        if(empty($cont)){
            $err[] = "content shouldn't be empty";
        }

        $to =  __DIR__ . '/images/' . $photo;
        $move = move_uploaded_file($tmp,$to);
                if($move == 0){
                    $prob[] = 'file uploaded successfully ✔️';
                }
                 elseif($move == 1){
                $err[] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                }
                elseif($move == 3){
                $err[] = 'The uploaded file was only partially uploaded';
                }
                elseif($move == 4){
                $err[] = 'No file was uploaded';
                }
                elseif($move == 7){
                 $err[] = 'Failed to write file to disk.';
                }
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
    <link rel="stylesheet" href="dist/style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <h1>Welcome to blog admin page</h1>
    </nav>
    <div class="formdiv">
        <form action="" method="post">
            <h1>Add a post</h1>
            <input type="file"><br>
            <input type="text" name="top" placeholder="TOPIC"><br>
            <!-- <input type="text" name="cont"><br> -->
            <textarea name="cont" id="" cols="30" rows="10"></textarea><br>
            <button type="submit" name="sub">SUBMIT</button>
        </form>
    </div>
    <div class="errs">
        <?php
            if((isset($_POST["sub"])) && (!empty($err))){
                echo "<h1> Something wen't wrong , Correct the following </h1><ol>";
                foreach($err as $cellary){
                    echo '<li>' . $cellary . '</li>' ;
                }
                echo '</ol>';
            }
        ?>
    </div>
</body>
</html>