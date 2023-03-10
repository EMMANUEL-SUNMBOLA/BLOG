<?php
    $prob = [];
    $err = [];
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["sub"])){
        $topic = strip_tags($_POST["top"]);
        $cont = strip_tags($_POST["cont"]);

        if(empty($topic)){
            $err[] = "Topic shouldn't be empty";
        }
        if(empty($cont)){
            $err[] = "content shouldn't be empty";
        }

    if(isset($_FILES["img"]) || (empty($_FILES["img"]))){
        $FILES = $_FILES["img"];
        $name = $FILES["name"];
        $type = $FILES["type"];
        $size = $FILES["size"];
        $tmp = $FILES['tmp_name'];
        $ferr = $FILES["error"];

        // if(($type !== "image/jpg") || $type !== "image/jpeg" || $type !== "image/png" || $type !== "image/" || )
        // $mac = explode("/",$type);
        // $err[] = $mac[0];
        // $err[] = $type;
        // $err[] = $size;
        // $err[] = $ferr;
        $allowed = ["image/jpg","image/png","image/jpeg","image/apng","image/gif","image/svg"];
        // if(($mac[0] !== "image") || ($mac[0] !== "video")){
        if(!in_array($type,$allowed)){
            $err[] = "invalid file type";
        }
        if($size > (10 * 1024 * 1024)){
            // 1024 * 1024 = 1mb ; adjust to fit the maximum file size you can allow
            $err[] = "file too big" . $size;
        }
      }
      else{
        $err[] = "select an image/video"; 
      }
      if(empty($err)){
          
          $to =  __DIR__ . '/images/' . $name;
        //   $to =  __DIR__ . 'assets/images/' . $name;
          $move = move_uploaded_file($tmp,$to);
     
          if($ferr == 0){
              $prob[] = 'file uploaded successfully ✔️';
          }
           elseif($ferr == 1){
          $prob[] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
          }
          elseif($ferr == 3){
          $prob[] = 'The uploaded file was only partially uploaded';
          }
          elseif($ferr == 4){
          $prob[] = 'No file was uploaded';
          }
          elseif($ferr == 7){
           $prob[] = 'Failed to write file to disk.';
          }
                //   if($move == 0){
                //       $err[] = 'file uploaded successfully ✔️';
                //   }
                //    elseif($move == 1){
                //   $err[] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                //   }
                //   elseif($move == 3){
                //   $err[] = 'The uploaded file was only partially uploaded';
                //   }
                //   elseif($move == 4){
                //   $err[] = 'No file was uploaded';
                //   }
                //   elseif($move == 7){
                //    $err[] = 'Failed to write file to disk.';
                //   }

                //   $txt = fopen("content.txt","a+");
                  $txt = fopen("../private/content.txt","a+");
                  $mesage =  "\n" . $name . "|" . $topic . "|" . $cont;
                  fwrite($txt,$mesage);
                  fclose($txt);
                  $prob[] = "blog written successfully";
      }
    }else{
        $err[] = "SOMETHING WEN'T WRONG";
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
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Add a post</h1>
            <input type="file" name="img" accept="image/*,video/*"><br>
            <input type="text" name="top" placeholder="TOPIC"><br>
            <!-- <input type="text" name="cont"><br> -->
            <input name="cont" id="" placeholder="CONTENT"><br>
            <button type="submit" name="sub">SUBMIT</button>
        </form>
    </div>
        <?php
            if((isset($_POST["sub"])) && (!empty($err))){
                echo '<div class="errs"><ul>';
                foreach($err as $cellary){
                    echo '<li>' . $cellary . '</li>' ;
                }
                echo '</ul>';
            }
            if((isset($_POST["sub"])) && (!empty($prob))){
                echo '<div class="prob">';
                foreach($prob as $cellary){
                    echo  $cellary . "<br>";
                }
            }

        ?>
    </div>
</body>
</html>