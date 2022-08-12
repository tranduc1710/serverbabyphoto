<?php
require "./api.php";
require "../model/imageModel.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $albumId = validateText($_POST["albumId"]);
    $urlImage = validateText($_POST["urlImage"]);
    $userUpload = validateText($_POST["userUpload"]);
    $description = validateText($_POST["description"]);
    
    $query = "INSERT INTO images (albumId, urlImage, userUpload, description) VALUES ('".$albumId."','".$urlImage."','".$userUpload."','".$description."')";
    $data = mysqli_query($conn, $query);

    success($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $albumID = validateText($_GET["albumID"]);

    $query = "SELECT * FROM images WHERE albumId LIKE '".$albumID."'";

    $res = mysqli_query($conn, $query);
    $arrayData = array();
    while ($data = mysqli_fetch_assoc($res)){
        array_push($arrayData, new ImageModel($data['albumId'], $data['urlImage'], $data['createDate'], $data['userUpload'], $data['description']));
    }

    if (count($arrayData) > 0){
        success($arrayData);
    }else{
        error("There are no image yet", array());
    }
}
?>