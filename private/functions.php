<?php

function fileH($fum){
    $allowed = ["image/jpg","image/png","image/jpeg","image/apng","image/gif","image/svg"];
    if($fum["size"] > (10 * 1024 *1024)){
        return 1;
    }elseif(!in_array($fum["type"],$allowed)){
        return 2;
    }else{
        return true;
    }
}