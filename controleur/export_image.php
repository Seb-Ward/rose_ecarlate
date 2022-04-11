<?php

if(isset($_GET['image_id'])){//If my image_id exist
    require_once "../model/image.php";
    $image=getImage($_GET['image_id']);    
    
    if($image!=null){
        echo $image->getImage_bin();
    }
}