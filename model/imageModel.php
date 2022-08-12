<?php
class ImageModel{
    function ImageModel($albumId, $urlImage, $createDate, $userUpload, $description	){
        $this -> albumId = $albumId;
        $this -> urlImage = $urlImage;
        $this -> createDate = $createDate;
        $this -> userUpload = $userUpload;
        $this -> description = $description;
    }
}
?>