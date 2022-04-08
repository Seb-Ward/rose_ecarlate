<?php

if(isset($_GET['image_id'])){
    require_once "../model/image.php";
    $image=getImage($_GET['image_id']);    
    
    if($image!=null){
        echo $image->getImage_bin();
    }
}