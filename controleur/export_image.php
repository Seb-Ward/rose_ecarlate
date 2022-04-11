<?php

if(isset($_GET['image_id'])){//If my image_id exist
    $image_id=intval($_GET['image_id']);
    if($image_id!=0){
    require_once "../model/image.php";
    $image=getImage($image_id);    
    
    if($image!=null){
        echo $image->getImage_bin();
    }
}
}