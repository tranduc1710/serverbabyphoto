<?php
require "./api.php";
require "../model/albumModel.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = validateText($_POST["name"]);
    $idCreateUser = validateText($_POST["idCreateUser"]);
    $gender = validateText($_POST["gender"]);
    $birthday = validateText($_POST["birthday"]);
    $relation = validateText($_POST["relation"]);

    $query = "SELECT COUNT(*) AS total FROM albums WHERE name LIKE '".$name."' AND idCreateUser = '".$idCreateUser."'";

    $data = mysqli_query($conn, $query);
    $count = mysqli_fetch_array($data)['total'];

    if ($count > 0){
        error("Album already exists", null);
    }else{
        $query = "INSERT INTO albums (name, idCreateUser, gender, birthday, relation) VALUES ('".$name."','".$idCreateUser."','".$gender."','".$birthday."','".$relation."')";
        $data = mysqli_query($conn, $query);
        success($data);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $userID = validateText($_GET["userID"]);

    $query = "SELECT * FROM albums WHERE idCreateUser LIKE '".$userID."'";

    $res = mysqli_query($conn, $query);
    $arrayData = array();
    while ($data = mysqli_fetch_assoc($res)){
        array_push($arrayData, new AlbumModel($data['name'], $data['createDate'], $data['lastUpdateTime'], $data['idCreateUser'], $data['gender'], $data['birthday'], $data['totalImage'], $data['relation']));
    }

    if (count($arrayData) > 0){
        success($arrayData);
    }else{
        error("There are no albums yet", array());
    }
}
?>