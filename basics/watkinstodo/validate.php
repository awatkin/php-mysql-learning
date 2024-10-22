<?php

include "db_connect.php";  //connect to the database

try {  //try this code, catch errors

    session_start();  //connect to session data for logged in

    $usnm = $_POST['username']; //copy username from post data

    $pswd = $_POST['password']; // copy the password from post data

    $sql = "SELECT * FROM mem WHERE uname = ?"; //set up the sql statement

    $stmt = $conn->prepare($sql); //prepares

    $stmt->bindParam(1,$_POST['username']);  //binds the parameters to execute

    $stmt->execute(); //run the sql code

    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results


    if($result){  // if there is a result returned

        $_SESSION["username"] = $_POST['username'];

        $_SESSION["userid"] = $result["userid"];

        if (password_verify($pswd, $password)) { // verifies the password is matched

            $_SESSION["ssnlogin"] = true;  // sets up the session variables

            $_SESSION["username"] = $_POST['username'];

            $_SESSION["userid"] = $result["userid"];

            $act = "log";

            $logtime = date("U");

            $password = $result["password"];  //brings password from result of sql

            $sql = "INSERT INTO audit (userid, date, activity) VALUES (?, ?, ?)";  //prepare the sql to be sent

            $stmt = $conn->prepare($sql); //prepare to sql

            $stmt->bindParam(1,$_SESSION["userid"]);  //bind parameters for security

            $stmt->bindParam(2, $logtime);

            $stmt->bindParam(3,$act);

            $stmt->execute();  //run the query to insert

            header("location:list.php");  //redirect on success

            exit();

        } else{

            session_destroy(); //if failed, kills session abnd error message
            header("refresh:4; url=login.html");
            echo "invalid password";
        }

    } else {

        echo "User not found";

    }




} catch (Exception $e) {
    echo $e;
}