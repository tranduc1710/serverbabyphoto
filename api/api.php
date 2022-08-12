<?php
require ("../connect/connect.php");

class Response{
    function Response($statusCode, $message, $data){
        $this -> statusCode = $statusCode;
        $this -> message = $message;
        $this -> data = $data;
    }
}

function success($dataRes){
    $statusCode = 200;
    $message = "Success";
    $res = new Response($statusCode, $message, $dataRes);
    die("\n".json_encode($res));
}

function error($message, $data){
    $statusCode = 200;
    $res = new Response($statusCode, $message, $data);
    die("\n".json_encode($res));
}

function checkPOST(){
    if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
        die("\nMethod don't support");
    }
}

function checkGET(){
    if ($_SERVER['REQUEST_METHOD'] !== 'GET'){
        die("\nMethod don't support");
    }
}

function validateText($text){
    if (!isset($text)){
        error("Missing input field", null);
    }
    if (empty($text)){
        error("Input missing parameter", null);
    }
    return $text;
}
?>