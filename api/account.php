<?php
require "./api.php";
require "../model/accountModel.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = validateText($_POST["username"]);
    $password = validateText($_POST["password"]);
    $email = validateText($_POST["email"]);
    $phone = validateText($_POST["phone"]);
    $firstName = validateText($_POST["firstName"]);
    $lastName = validateText($_POST["lastName"]);

    $query = "SELECT COUNT(*) AS total FROM account WHERE username LIKE '".$username."'";

    $data = mysqli_query($conn, $query);
    $count = mysqli_fetch_array($data)['total'];

    if ($count > 0){
        error("Account already exists");
    }else{
        $query = "INSERT INTO account (username, password, email, phone, firstName, lastName) VALUES ('".$username."','".$password."','".$email."','".$phone."','".$firstName."','".$lastName."')";
        $data = mysqli_query($conn, $query);
        success($data);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $username = validateText($_GET["username"]);
    $password = validateText($_GET["password"]);

    $query = "SELECT * FROM account WHERE username LIKE '".$username."' AND password LIKE '".$password."'";

    $res = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($res);

    if (isset($data)){
        success($data);
    }else{
        error("Account does not exist");
    }
}
?>