<?php

include "db_connect.php";

try {
    $usnm = $_POST['uname'];
    $pswd = $_POST['password'];

    $sql = "SELECT password FROM mem WHERE uname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1,$usnm);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        $password = $result["password"];

        if (password_verify($pswd, $password)) {
            echo "Welcome " . $usnm;
        } else{
           echo "invalid password";
        }

    } else {
        echo "User not found";
    }




} catch (Exception $e) {
    echo $e;
}