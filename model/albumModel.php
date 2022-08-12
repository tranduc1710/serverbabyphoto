<?php
class AlbumModel{
    function AlbumModel($name, $createDate, $lastUpdateTime, $idCreateUser, $gender, $birthday, $totalImage, $relation){
        $this -> name = $name;
        $this -> createDate = $createDate;
        $this -> lastUpdateTime = $lastUpdateTime;
        $this -> idCreateUser = $idCreateUser;
        $this -> gender = $gender;
        $this -> birthday = $birthday;
        $this -> totalImage = $totalImage;
        $this -> relation = $relation;
    }
}
?>