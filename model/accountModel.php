<?php
class AccountModel{
    function AccountModel($username, $password, $email, $phone, $firstName, $lastName){
        $this -> username = $username;
        $this -> password = $password;
        $this -> email = $email;
        $this -> phone = $phone;
        $this -> firstName = $firstName;
        $this -> lastName = $lastName;
    }
}
?>